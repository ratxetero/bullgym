<?php

declare(strict_types=1);

namespace App\Controller;

class FullcalendarController extends AppController
{

 

    public function initialize(): void
    {
        
        parent::initialize();
        $this->Authorization->skipAuthorization();
        $this->loadModel("Events");
        
    }

    public function myEvents()
    {
        // FullCalendar in frontend
        $this->viewBuilder()->setLayout('layoutCalendar');
        $this->Authorization->skipAuthorization();
    }

    public function loadData()
    {
        $this->Authorization->skipAuthorization();
        if ($this->request->is("ajax")) {
            // on page load this ajax code block will be run
            $data = $this->Events->find()->where([
                'start >=' => $this->request->getQuery('start'),
                'end <=' => $this->request->getQuery('end')
            ])->toList();

            echo json_encode($data);
        }
        die;
    }

    public function ajax()
    {
        $this->Authorization->skipAuthorization();
        if ($this->request->is("ajax")) {

            switch ($this->request->getData('type')) {
                
                    // For add event
                case 'add':
                    $event = $this->Events->newEmptyEntity();

                    $event = $this->Events->patchEntity($event, $this->request->getData());

                    if ($this->Events->save($event)) {
                        echo json_encode([
                            "status" => 1,
                            "message" => "Event added successfully"
                        ]);
                    }

                    echo json_encode([
                        "status" => 0,
                        "message" => "Failed to add event"
                    ]);
                    die;
                    break;

                    // For update event        
                case 'update':

                    $event = $this->Events->get($this->request->getData("id"));

                    $event = $this->Events->patchEntity($event, $this->request->getData());

                    if ($this->Events->save($event)) {
                        echo json_encode([
                            "status" => 1,
                            "message" => "Event updated successfully"
                        ]);
                    }

                    echo json_encode([
                        "status" => 0,
                        "message" => "Failed to update event"
                    ]);
                    die;
                    break;

                    // For delete event    
                case 'delete':

                    $event = $this->Events->get($this->request->getData("id"));

                    if ($this->Events->delete($event)) {
                        echo json_encode([
                            "status" => 1,
                            "message" => "Event deleted successfully"
                        ]);
                    }

                    echo json_encode([
                        "status" => 0,
                        "message" => "Failed to delete event"
                    ]);
                    die;
                    break;

                default:
                    break;
            }
        }
    }


}
