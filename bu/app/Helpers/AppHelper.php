namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class AppHelper
{
	
	public static function access_menu($menu_id)
    {	
        return DB::table('menu as b')
        ->join('menu_access as a', 'a.menu_id', '=', 'b.menu_id')
        ->join('users as d', 'd.user_roles_id', '=', 'a.user_roles_id')
        ->join('user_roles as e', 'd.user_roles_id', '=', 'e.id')
        ->select('d.memb_code as memb_code', 'b.menu_action3 as menu_action3', 'a.meac_action3 as meac_action3', 'b.menu_action2 as menu_action2', 'a.meac_action2 as meac_action2', 'b.menu_action1 as menu_action1', 'a.meac_action1 as meac_action1', 'e.user_name as user_name', 'b.menu_url as menu_url', 'b.menu_faIcon as menu_faIcon', 'b.menu_title_ID as menu_title_ID', 'd.user_id as user_id', 'a.meac_C as meac_C', 'a.meac_R as meac_R', 'a.meac_U as meac_U', 'a.meac_D as meac_D', 'a.meac_printing as meac_printing', 
        'a.meac_detail as meac_detail', 'b.menu_C as menu_C', 'b.menu_R as menu_R', 'b.menu_U as menu_U', 'b.menu_D as menu_D', 'b.menu_printing as menu_printing', 
        'b.menu_detail as menu_detail', 'b.menu_display as menu_display')
        ->where('a.menu_id', '=', $menu_id)
        ->where('b.menu_display', '=',1)
        ->where('d.id', '=', session('user_id'))->first();
    }
    
    public static function select_menu() {
        return DB::table('menu')
        ->where('menu_display', '=', 1)
        ->orderBy('menu_menu_order', 'asc')->get();
    }
}