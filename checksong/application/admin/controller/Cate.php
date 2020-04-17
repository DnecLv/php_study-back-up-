<?php
namespace app\admin\controller;
use think\Controller;
class Cate extends Controller
{
    public function songlst()
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
    public function singerlst()
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
    public function albumlst()
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
    public function add()
    {
        if(request()->isPost()&&input('Ssong'))
        {
            $data=input('post.');

            // dump($data);die();
            $add=db('song')->insert($data);
            if($add)
            {
                $this->success('complate');
            }
            else
            {
                $this->error('lose');
            }
            
        }
        if(request()->isPost()&&input('Sname'))
        {
            $data=input('post.');

            // dump($data);die();
            $add=db('singer')->insert($data);
            if($add)
            {
                $this->success('complate');
            }
            else
            {
                $this->error('lose');
            }
            
        }
        if(request()->isPost()&&input('Aname'))
        {
            $data=input('post.');

            // dump($data);die();
            $add=db('album')->insert($data);
            if($add)
            {
                $this->success('complate');
            }
            else
            {
                $this->error('lose');
            }
            
        }
        $albumRes=db('album')->select();
        $this->assign
        (
            ['albumRes'=>$albumRes,]
        );
        $singerRes=db('singer')->select();
        $this->assign
        (
            ['singerRes'=>$singerRes,]
        );
        return view();
    }

    public function editsong()
    {

        if(request()->isPost())
        {
            $data=input('post.');
            $updt=db('song')->update($data);
            // dump($data);die();
            if($updt !==false)
            {
                $this->success('complate',url('songlst'));
            }
            else
            {
                $this->error('lose');
            }
            
        }
        $id=input('id');
        $myself=db('song')->find($id);
        $this->assign
        (
            ['myself'=>$myself,]
        );
        $albumRes=db('album')->select();
        $this->assign
        (
            ['albumRes'=>$albumRes,]
        );
        $singerRes=db('singer')->select();
        $this->assign
        (
            ['singerRes'=>$singerRes,]
        );
        return view();
    }

    public function editsinger()
    {

        if(request()->isPost())
        {
            $data=input('post.');
            $updt=db('singer')->update($data);
            // dump($data);die();
            if($updt !==false)
            {
                $this->success('complate',url('singerlst'));
            }
            else
            {
                $this->error('lose');
            }
            
        }
        $id=input('id');
        $myself=db('singer')->find($id);
        $this->assign
        (
            ['myself'=>$myself,]
        );
        return view();
    }
    public function editalbum()
    {

        if(request()->isPost())
        {
            $data=input('post.');
            $updt=db('album')->update($data);
            // dump($data);die();
            if($updt !==false)
            {
                $this->success('complate',url('albumlst'));
            }
            else
            {
                $this->error('lose');
            }
            
        }
        $id=input('id');
        $myself=db('album')->find($id);
        $this->assign
        (
            ['myself'=>$myself,]
        );
        $singerRes=db('singer')->select();
        $this->assign
        (
            ['singerRes'=>$singerRes,]
        );
        return view();
    }
    public function delsong($id)
    {
        $del=db('song')->delete($id);
        if($del)
        {
            $this->success('complate');
        }
        else
        {
            $this->error('lose');
        }   
    }
    public function delsinger($id)
    {
        $del=db('singer')->delete($id);
        if($del)
        {
            $this->success('complate');
        }
        else
        {
            $this->error('lose');
        }
        
    }public function delalbum($id)
    {
        $del=db('album')->delete($id);
        if($del)
        {
            $this->success('complate');
        }
        else
        {
            $this->error('lose');
        }
        
    }
}
