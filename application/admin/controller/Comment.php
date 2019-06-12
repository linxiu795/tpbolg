<?php

namespace app\admin\controller;

use think\Controller;

class Comment extends Controller
{
    //评论列表
    public function all()
    {
        $comments = model('Comment')->with('article,member')->order('create_time','desc')->paginate(10);
        $viewDate = [
            'comments' => $comments
        ];
        $this->assign($viewDate);
        return view();
    }

    //评论删除
    public function del()
    {
        $commentInfo = model('Comment')->find(input('post.id'));
        $result = $commentInfo->delete();
        if ($result) {
            $this->success('删除成功！','admin/comment/all');
        }else {
            $this->error('删除失败！');
        }
    }
}
