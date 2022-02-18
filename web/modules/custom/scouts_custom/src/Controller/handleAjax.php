<?php

namespace Drupal\scouts_custom\Controller;

use Drupal\Core\Controller\ControllerBase;
use \Symfony\Component\HttpFoundation\Response;
use Drupal\node\Entity\Node;
use Drupal\paragraphs\Entity\Paragraph;

/**
 * scout_custom_waitlist_event
 */

function scout_custom_waitlist_event($nid, $member_number, $button_id, $user_id)
{

    // So need to load the event node. And then set the "wait list" field to the UID of the person clicking on the link.
    $node = \Drupal\node\Entity\Node::load($nid);
    $current_waitlist = $node->get('field_waitlist')->getValue();

    $current_waitlist[] = ['target_id' => $user_id];

    $node->set("field_waitlist", $current_waitlist);
    $node->save();

    $returnArray = [
        'status' => 1,
        'nid' => $nid,
        'member_number' => $member_number,
        'button_id' => $button_id,
        'user_id' => $user_id,
        'current_waitlist' => $current_waitlist,
    ];

    return $returnArray;
}

/**
 * An example controller.
 */
class handleAjax extends ControllerBase
{

    /**
     * {@inheritdoc}
     */
    public function Render()
    {
        if ($_POST['function_call'] == "add-to-waitlist") {
            $data = scout_custom_waitlist_event(
                $_POST['nid'],
                $_POST['member_number'],
                $_POST['button_id'],
                $_POST['user'],
            );
        }

        // This is the important part, because will render only the TWIG template.
        $response = new Response();
        $response->setContent(json_encode($data));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
}
