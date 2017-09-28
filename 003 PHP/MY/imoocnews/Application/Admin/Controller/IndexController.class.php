<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends CommonController {
    public function index(){
        $news = D("News")->maxcount();
        $newscount = D("News")->getNewsCount(array("status"=>1));
        $positioncout = D("Position")->getPositionsConut(array("status"=>1));
        $admincount = D("Admin")->getLastLoginUsers();

        $this->assign("news",$news)
            ->assign("newscount",$newscount)
            ->assign("positioncout",$positioncout)
            ->assign("admincount",$admincount);
        $this->display();
    }
}