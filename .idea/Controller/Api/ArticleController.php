<?php
require_once PROJECT_ROOT_PATH . "/Model/ArticleModel.php";

class ArticleController extends BaseController
{
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
                            $responseData = json_encode($this->getArticle());
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

    public function getArticle()
    {
        $article0 = new ArticleModel(
            'A0',
            'SeaLevel.png',
            'Sea level rise',
            'Sea level rise is a significant consequence of global warming caused by human activities. According to NASA\'s Vital Signs of the Planet, global sea levels have been rising at unprecedented rates over the past 2,500-plus years. This phenomenon is primarily caused by two factors related to global warming: the added water from melting ice sheets and glaciers, and the expansion of seawater as it warms. A graph on the website tracks the change in global sea level since 1993, as observed by satellites. It highlights the critical importance of reducing our carbon footprint and taking bold actions to mitigate climate change to avoid the severe consequences of sea-level rise.',
            "National Aeronautics and Space Administration (NASA)",
            "Climate Science",
            'https://climate.nasa.gov/vital-signs/sea-level/ ',
            1680498911000);
        $article1 = new ArticleModel(
            'A1',
            'disasters.jpg',
            'Extreme weather',
            'Extreme weather events have become more frequent and severe in recent years, leading to devastating consequences for communities around the world. The United Nations report shows that climate change is the primary driver behind this increase in extreme weather events, leading to a rise of 83% in climate-related disasters over the past two decades. The report indicates that major floods have more than doubled, and the number of severe storms has increased by 40%, while droughts, wildfires, and heatwaves have also become more common. The impact of these events is not limited to environmental damage, but also has serious economic and human costs, resulting in global economic losses of $2.97 trillion and claiming 1.23 million lives. The report emphasizes the urgent need to invest in disaster prevention and preparedness, such as improving infrastructure, communication systems, and evacuation plans, to reduce the impacts of extreme weather events. It is crucial that we take action to address the root causes of climate change and work towards building more resilient communities that can better withstand the impacts of extreme weather events.',
            "Carbon Brief",
            "Climate Change and Extreme Weather",
            'https://www.carbonbrief.org/mapped-how-climate-change-affects-extreme-weather-around-the-world/ ',
            1680498911000);
        $article2 = new ArticleModel(
            'A2',
            'livingPlanetIndex.png',
            'Biodiversity loss',
            'Biodiversity loss is a major environmental challenge that has been ongoing for several decades. One of the widely-used metrics to track this loss is the Living Planet Index (LPI), which measures the average change in population size of tens of thousands of animal populations. Since 1970, the LPI has reported an average decline of 69% in the size of animal populations for which data is available. However, it is important to note that the LPI data is not globally representative and some regions have more data available than others. Additionally, the LPI does not tell us the number of species lost, number of populations or individuals that have been lost, number or percentage of species or populations that are declining, or number of extinctions. For example, the number of extinctions due to habitat loss, climate change, and human activities has been increasing rapidly. Some of the species that have gone extinct in recent years include the golden toad in Costa Rica, the Pyrenean ibex in Spain, and the po’ouli bird in Hawaii. The loss of biodiversity is not limited to these examples, and many more species are at risk of extinction due to human activities such as deforestation, overfishing, pollution, and climate change.',
            "Our World in Data",
            "Biodiversity",
            'https://ourworldindata.org/biodiversity ',
            1680498911000);
        return array($article0, $article1, $article2);
    }
}

?>