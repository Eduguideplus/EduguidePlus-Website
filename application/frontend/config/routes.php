<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


/*



| -------------------------------------------------------------------------



| URI ROUTING



| -------------------------------------------------------------------------



| This file lets you re-map URI requests to specific controller functions.



|



| Typically there is a one-to-one relationship between a URL string



| and its corresponding controller class/method. The segments in a



| URL normally follow this pattern:



|



|	example.com/class/method/id/



|



| In some instances, however, you may want to remap this relationship



| so that a different class/function is called than the one



| corresponding to the URL.



|



| Please see the user guide for complete details:



|



|	http://codeigniter.com/user_guide/general/routing.html



|



| -------------------------------------------------------------------------



| RESERVED ROUTES



| -------------------------------------------------------------------------



|



| There area two reserved routes:



|



|	$route['default_controller'] = 'welcome';



|



| This route indicates which controller class should be loaded if the



| URI contains no data. In the above example, the "welcome" class



| would be loaded.



|



|	$route['404_override'] = 'errors/page_missing';



|



| This route will tell the Router what URI segments to use if those provided



| in the URL cannot be matched to a valid route.



|



*/


$route['default_controller'] = "home";


$route['404_override'] = 'not_found';


require_once(BASEPATH . 'database/DB.php');


$db =& DB();


//start site page routing

$db->select('controller,slug');


$db->from('app_routes');


$query = $db->get();


$result = $query->result();


foreach ($result as $row) {


    if (trim($row->controller) != '') {


        $route[$row->slug] = $row->controller;


        $route[$row->slug . '/:any'] = $row->controller;


        //$route[ $row->controller ]           = 'error404';


        //$route[ $row->controller.'/:any' ]   = 'error404';


    } else {


        $route[$row->slug] = 'manage_content/content';


        $route[$row->slug . '/:any'] = 'manage_content/content';


        //$route[ $row->controller ]           = 'error404';


        //$route[ $row->controller.'/:any' ]   = 'error404';


    }


}

/*

//end site page routing


//start site page routing
$db->select('category_slug');
$db->from('tbl_category');
$query = $db->get();
$resultApp = $query->result();
foreach( $resultApp as $rowApp )
{
    $route[ $rowApp->category_slug ]                 = 'manage_product/product_details';
    $route[ $rowApp->category_slug.'/:any' ]         = 'manage_product/product_details';
    //$route[ $row->controller ]           = 'error404';
    //$route[ $row->controller.'/:any' ]   = 'error404';


}
//end site page routing


/* End of file routes.php */


/* Location: ./application/config/routes.php */