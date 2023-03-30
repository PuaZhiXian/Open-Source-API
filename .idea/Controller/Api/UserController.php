<?php
require_once PROJECT_ROOT_PATH . "/Model/UserModel.php";

class UserController extends BaseController
{

    //user/list Endpoint - get list of user
    public function listAction()
    {
        $errorMsg = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        $strErrorDesc = '';
        switch (strtoupper($requestMethod)) {
            case "GET":
                try {
                    switch ($this->getAction()) {
                        case "list":
                            $responseData = json_encode($this->getUser());
                            break;
                        default:
                            $strErrorDesc = "Method not supported";
                            $strErrorHeader = "HTTP?1.1 422 Unprocessable Entity";
                            break;
                    }

                } catch (Error $error) {
                    $strErrorDesc = $error->getMessage();
                    $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
                }
                break;
            default:
                $strErrorDesc = "Method not supported";
                $strErrorHeader = "HTTP?1.1 422 Unprocessable Entity";
                break;
        }

        if (!$strErrorDesc) {
            $this->sendOutput($responseData,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK'));
        } else {
            $this->sendOutput(json_encode(array('error' => $strErrorDesc)),
                array('Content-Type: application/json', $strErrorDesc));
        }


    }

    public function getUser()
    {
        $pua = new User('PUA ZHI XIAN', 'FullStack Developer');
        $jiahong = new User('Sim Jia Hong', 'UI/UX Developer');
        $chunHan = new User('Tiow Chun Han', 'Frontend Developer');
        $yihang = new User('Low Yi Hang', 'Backend Developer');
        return array($pua, $jiahong, $chunHan, $yihang);
    }
}

?>