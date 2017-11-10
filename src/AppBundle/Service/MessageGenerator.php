<?php
/**
 * Created by PhpStorm.
 * User: benr242
 * Date: 8/17/17
 * Time: 4:29 PM
 */

namespace AppBundle\Service;


class MessageGenerator
{
    public function getHappyMessage()
    {
        $messages = [
            'You did it! You updated the system! Amazing!',
            'That was one of the coolest updates I\'ve seen all day!',
            'Great work! Keep going!',
        ];

        $index = array_rand($messages);

        return $messages[$index];
    }
}