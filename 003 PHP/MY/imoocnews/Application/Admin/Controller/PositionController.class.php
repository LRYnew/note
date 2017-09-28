<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Exception;

/**
 * Class PositionController  推荐位控制类
 * @package Admin\Controller
 */
class PositionController extends CommonController{
    public function index(){
        $where["status"] = array("neq",-1);

        $page = $_REQUEST['p']?$_REQUEST['p']:1;
        $pageSize = $_REQUEST["pagesize"]?$_REQUEST["pagesize"]:5;

        $positions = D('Position')->getpositions($where,$page,$pageSize);
        $positionsCount = D("Position")->getPositionsConut($where);

        $res = new \Think\Page($positionsCount,$pageSize);
        $resPage = $res->show();

        $this->assign("positions",$positions)
            ->assign("resPage",$resPage);
        $this->display();
    }

    //添加操作
    public function add(){
        if($_POST) {
            $name = I("post.name",'', 'string,trim,htmlspecialchars');
            $description = I("post.description", '', 'string,trim,htmlspecialchars');
            $status = I("post.status",'','number_int,trim,htmlspecialchars');
            if (!$name) {
                return show(0,'推荐位名称不符合规则');
            }
            if (!$description) {
                return show(0, '推荐位描述不符合规则');
            }
            if ($status === false || $status == "") {
                return show(0,$status);
            }
            if($id = I("post.id")){
                return $this->save($id,I("post."));
            }
            $positionId = D("Position")->insert(I("post."));
            if (!$positionId) {
                return show(0, "新增失败");
            }
            return show(1, "新增成功");
        }else{
            $this->display();
        }
    }
    //修改操作
    public function edit(){
        $id = I("get.id");
        $position = D("Position")->find(intval($id));
        try{
            if(!$position){
                return redirect(__ROOT__."/admin/position/index");
            }
            $this->assign("position",$position);
            $this->display();
        }catch(Exception $e){
            return show(0,$e->getMessage());
        }
    }

    //更新操作
    public function save($id,$data){
        try{
            $result = D('Position')->updatePositionById($id,$data);
            if($result === false){
                return show(0,"修改失败");
            }
            return show(1,"修改成功");
        }catch(Exception $e){
            return show(0,$e->getMessage());
        }
    }

    //更新状态操作
    public function setstatus(){
        $id = I("post.id");
        $data = I("post.");
        if(!$id){
            return show(0,"Id不存在");
        }
        if(!$status){
            return show(0,"状态值出现问题");
        }
        return $this->save($id,$data);
    }
}