<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Laravel\Dusk\Chrome;
use Illuminate\Foundation\Testing\DatabaseMigrations;

use App\User;
use App\Provider;
class ProviderTest extends DuskTestCase
{
   protected $name='Gabriel Lamas'; 
   protected $cuit='20369129653';
   protected $address='ragones 3';
   protected $location='Salta';
   protected $province='Salta';
   protected $phone='3875784434';
   protected $email='Gabriel@gmail.com';

    public function test_create_provider()
    {
        $user=factory(User::class)->create(['email'=>'fairam789@gmail.com',]);

        $this->browse(function (Browser $browser) use ($user){

            $browser->visit('craft/public/admin/providers/create')
                    ->type('email',$user->email)
                    ->type('password','secret')
                    ->press('Iniciar sesión')
                    ->assertPathIs('/craft/public/admin/providers/create')
                    ->type('name',$this->name)
                    ->type('cuit',$this->cuit)
                    ->type('address',$this->address)
                    ->type('location',$this->location)
                    ->type('province',$this->province)
                    ->type('phone',$this->phone)
                    ->type('email',$this->email)
                    ->press('Guardar')
                    ->assertPathIs('/craft/public/admin/providers')
                    ;
           });

        $this->assertDatabaseHas('providers',[
                   
                   'name'=>$this->name,
                   'cuit'=>$this->cuit,
                   'address'=>$this->address,
                   'location'=>$this->location,
                   'province'=>$this->province,
                   'phone'=>$this->phone,
                   'email'=>$this->email,
                    
                ]);
    }
}
