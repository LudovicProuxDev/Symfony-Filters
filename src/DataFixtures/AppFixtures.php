<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Color;
use App\Entity\Item;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Uid\Uuid;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $smartphone = new Category();
        $smartphone->setLabel('Smartphone');
        $smartphone->setUuid(Uuid::v7());
        $manager->persist($smartphone);

        $keyboard = new Category();
        $keyboard->setLabel('Keyboard');
        $keyboard->setUuid(Uuid::v7());
        $manager->persist($keyboard);

        $monitor = new Category();
        $monitor->setLabel('Monitor');
        $monitor->setUuid(Uuid::v7());
        $manager->persist($monitor);

        $personalComputer = new Category();
        $personalComputer->setLabel('PC');
        $personalComputer->setUuid(Uuid::v7());
        $manager->persist($personalComputer);

        $mouse = new Category();
        $mouse->setLabel('Mouse');
        $mouse->setUuid(Uuid::v7());
        $manager->persist($mouse);



        $red = new Color();
        $red->setCode('#FF0000');
        $red->setLabel('Red');
        $red->setUuid(Uuid::v7());
        $manager->persist($red);

        $green = new Color();
        $green->setCode('#00FF00');
        $green->setLabel('Green');
        $green->setUuid(Uuid::v7());
        $manager->persist($green);
        
        $blue = new Color();
        $blue->setCode('#0000FF');
        $blue->setLabel('Blue');
        $blue->setUuid(Uuid::v7());
        $manager->persist($blue);
        
        
        
        $smartphoneR = new Item();
        $smartphoneR->setName('iPhone');
        $smartphoneR->setQuantity(15);
        $smartphoneR->setCategory($smartphone);
        $smartphoneR->setColor($red);
        $smartphoneR->setUuid(Uuid::v7());
        $manager->persist($smartphoneR);
        
        $keyboardB = new Item();
        $keyboardB->setName('Logitech K85-630');
        $keyboardB->setQuantity(9);
        $keyboardB->setCategory($keyboard);
        $keyboardB->setColor($blue);
        $keyboardB->setUuid(Uuid::v7());
        $manager->persist($keyboardB);
        
        $monitorG = new Item();
        $monitorG->setName('Dell');
        $monitorG->setQuantity(2);
        $monitorG->setCategory($monitor);
        $monitorG->setColor($green);
        $monitorG->setUuid(Uuid::v7());
        $manager->persist($monitorG);
        
        $personalComputerB = new Item();
        $personalComputerB->setName('HP');
        $personalComputerB->setQuantity(2);
        $personalComputerB->setCategory($personalComputer);
        $personalComputerB->setColor($blue);
        $personalComputerB->setUuid(Uuid::v7());
        $manager->persist($personalComputerB);
        
        $mouseR = new Item();
        $mouseR->setName('Logitech M48751');
        $mouseR->setQuantity(20);
        $mouseR->setCategory($mouse);
        $mouseR->setColor($red);
        $mouseR->setUuid(Uuid::v7());
        $manager->persist($mouseR);
        
        $monitorB = new Item();
        $monitorB->setName('Iiyama');
        $monitorB->setQuantity(6);
        $monitorB->setCategory($monitor);
        $monitorB->setColor($blue);
        $monitorB->setUuid(Uuid::v7());
        $manager->persist($monitorB);
        
        $smartphoneG = new Item();
        $smartphoneG->setName('A15');
        $smartphoneG->setQuantity(18);
        $smartphoneG->setCategory($smartphone);
        $smartphoneG->setColor($green);
        $smartphoneG->setUuid(Uuid::v7());
        $manager->persist($smartphoneG);

        $personalComputerR = new Item();
        $personalComputerR->setName('Victus');
        $personalComputerR->setQuantity(4);
        $personalComputerR->setCategory($personalComputer);
        $personalComputerR->setColor($red);
        $personalComputerR->setUuid(Uuid::v7());
        $manager->persist($personalComputerR);

        $keybordG = new Item();
        $keybordG->setName('Apple');
        $keybordG->setQuantity(13);
        $keybordG->setCategory($keyboard);
        $keybordG->setColor($green);
        $keybordG->setUuid(Uuid::v7());
        $manager->persist($keybordG);

        $mouseB = new Item();
        $mouseB->setName('Microsoft');
        $mouseB->setQuantity(13);
        $mouseB->setCategory($mouse);
        $mouseB->setColor($blue);
        $mouseB->setUuid(Uuid::v7());
        $manager->persist($mouseB);

        $manager->flush();
    }
}
