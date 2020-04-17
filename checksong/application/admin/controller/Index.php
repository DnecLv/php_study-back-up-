<?php
namespace app\admin\controller;
use think\Controller;
class Index extends Controller
{
    public function index()
    {
        $cateRes=db('song')->order('Sclick','desc')->paginate(10);
        $this->assign
        (
            ['cateRes'=>$cateRes,]
        );
        return view();
    }
    public function songsearch()
    {
        if(request()->isPost())
        {
            $data=input('post.');

            $cateRes=db('song')->where('Ssong','like',$data)->paginate(10);
        }
        else
        {
            $cateRes=db('song')->paginate(10);
        }      
        $this->assign
        (
            ['cateRes'=>$cateRes,]
        );  
        return view();
    }
    public function singersearch()
    {
        if(request()->isPost())
        {
            $data=input('post.');

            $cateRes=db('singer')->where('Sname','like',$data)->paginate(10);
        }
        else
        {
            $cateRes=db('singer')->paginate(10);
        }      
        $this->assign
        (
            ['cateRes'=>$cateRes,]
        );  
        return view();
    }
    public function albumsearch()
    {
        if(request()->isPost())
        {
            $data=input('post.');

            $cateRes=db('album')->where('Aname','like',$data)->paginate(10);
        }
        else
        {
            $cateRes=db('album')->paginate(10);
        }      
        $this->assign
        (
            ['cateRes'=>$cateRes,]
        );  
        return view();
    }
    public function song()
    {
        $id=input('id');
        $myself=db('song')->find($id);
        $this->assign
        (
            ['myself'=>$myself,]
        );
        db('song')->where('Sid', $id)->setInc('Sclick');
        return view();
    }
    public function singer()
    {
        $id=input('id');
        $myself=db('singer')->find($id);
        $this->assign
        (
            ['myself'=>$myself,]
        );
        return view();
    }
    public function album()
    {
        $id=input('id');
        $myself=db('album')->find($id);
        $this->assign
        (
            ['myself'=>$myself,]
        );
        return view();
    }
}
