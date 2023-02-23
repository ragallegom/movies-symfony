<?php

namespace App\DataFixtures;

use App\Entity\Movie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MovieFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $movie = new Movie();
        $movie->setTitle('The Dark Knght');
        $movie->setReleaseYear(2008);
        $movie->setDescription('This is the description of the Dark Knight');
        $movie->setImagePath('https://i0.wp.com/imgs.hipertextual.com/wp-content/uploads/2022/01/batman-michael-keaton.jpg?resize=768%2C605&quality=55&strip=all&ssl=1');
        
        //Add data to pivot table
        $movie->addActor($this->getReference('actor_1'));
        $movie->addActor($this->getReference('actor_2'));
        $manager->persist($movie);

        $movie2 = new Movie();
        $movie2->setTitle('Avengers: Endgame');
        $movie2->setReleaseYear(2019);
        $movie2->setDescription('This is the description of Avengers: Endgame');
        $movie2->setImagePath('https://es.wikipedia.org/wiki/Archivo:Avengers_endgame_logo.png');

          //Add data to pivot table
        $movie2->addActor($this->getReference('actor_3'));
        $movie2->addActor($this->getReference('actor_4'));
        $manager->persist($movie2);

        $manager->flush();
    }
}
