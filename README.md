     Schema::table('images', function (Blueprint $table) {
            
            $table->text('lables')->nullable();
            
            $table->string('adult')->nullable();
            $table->string('spoof')->nullable();
            $table->string('medical')->nullable();
            $table->string('violence')->nullable();
            $table->string('racy')->nullable();


        });


1-logica del semaforo nella pagina di dettaglio del revisore    
2-sistemare il showPassword
3-sistemare lo swiper del dettalgio revisore