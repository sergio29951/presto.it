<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use App\Jobs\RemoveFaces;

use App\Jobs\ResizeImage;
use Livewire\WithFileUploads;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CreateProduct extends Component
{   

    use WithFileUploads;


    public $title;
    public $body;
    public $price;
    public $category;
    public $temporary_images;
    public $images = [];
    public $image;
    public $form_id;
    public $product;
    public $validated;



    protected $rules = [
        'title' => 'required|min:4',
        'body' => 'required|min:10',
        'price' =>'required|numeric|min:0.1',
        'category' =>'required',
        'images.*' =>'image|max:1024',
        'temporary_images.*' =>'image|max:1024'

    ];

    protected $messages=[

        'required'=>'Il campo :attribute è richiesto',
        'min'=>'il campo :attribute è troppo corto',
        'temporary_images.required' => 'L\'immagine è richiesta',
        'temporary_images.*.image' => 'i file devono essere immagini',
        'temporary_images.*.max' => 'L\'immagine è richiesta dev\'essere massimo di 1MB',
        'images.image' => 'L\'immagine è richiesta dev\'essere una immagine',
        'images.max' => 'L\'immagine dev\'essere massimo di 1MB',



        
    ];

    public function updatedTemporaryImages()
    {
        if ($this->validate([

            'temporary_images.*'=>'image|max:1024',]))
            
        {
            foreach($this->temporary_images as $image){

                $this->images[]=$image;

            }
        }
    }

    public function removeImage($key)
    {
        if (in_array($key,array_keys($this->images))) {

            unset($this->images[$key]); 

        }
    }

    public function store(){
        
        $this->validate();

        $this->product = Category::find($this->category)->products()->create($this->validate());

        $this->product->user()->associate(Auth::user());
        $this->product->save();


        
        if (count($this->images)) {

            foreach ($this->images as $image) {

                // $this->product->images()->create(['path' => $image->store('images', 'public')]);
                $newFileName = "products/{$this->product->id}";
                $newImage = $this->product->images()->create(['path' => $image->store($newFileName,'public')]);

                RemoveFaces::withChain([

                    new ResizeImage($newImage->path, 400, 300),
                    new GoogleVisionSafeSearch($newImage->id),
                    new GoogleVisionLabelImage($newImage->id),
                ])->dispatch($newImage->id);



            }

            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }

        session()->flash('message', 'Articolo inserito con successo, sarà pubblicato dopo la revisione');
        $this->cleanForm();

    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function cleanForm(){

        $this->title = '';
        $this->body = '';
        $this->price = '';
        $this->category = '';
        $this->images = [];
        $this->temporary_images = [];

    }

    public function render()
    {
        return view('livewire.create-product');
    }
}
