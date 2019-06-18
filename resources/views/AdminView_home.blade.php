<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="/css/app.css" />
    <!--link rel="stylesheet" type="text/css" href="/css/DrSky.css"/-->
    <script src="/js/app.js"></script>
  
    <!-- Bootstrap CSS -->

    <title>萌向星空-管理页</title>
    <style>

    #mymenu{
        display: none;
    }

    .sidebar_list{
        display:block;
    }
    th{
        text-align: center;
    }
    td{
        text-align: center;
    }
@media only screen and (max-width:780px){

    #mymenu{
        display: block;
    }
    .sidebar_list{
        display:none;
    }
}
        </style>
 </head>
  <body>
        <header class="navbar  flex-column flex-md-row bd-navbar">
            <div class="navbar-nav-scroll">
            <ul class="nav  flex-rows">
                <li class="nav-item">
                    <a class="nav-link active" href="#">技能树</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">资料库</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">文档库</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">代码库</a>
                </li>
            </ul>
            </div>
            <ul class="navbar-nav flex-row">
                <li class="nav-item" href="#"><h4>萌向星空</h4></li>
            </ul>
            <a class="dropdown-toggle" id="mymenu"></a>
        </header>
                <span class="caret"></span>
        <div class="container-fluid">
            <div class="row flex-xl-nowap">
                <div id="sidebar" class="col-12 col-md-3 col-xl-2">
                    <form>
                        <input class="form-control" type="text" placeholder="搜索框">
                    </form>
                    <div class="sidebar_list">
                        <ul class="list-group">
  <li class="list-group-item list-group-item-action list-group-item-primary"><a href=".">首页</a></li>
  <li class="list-group-item list-group-item-action list-group-item-primary"><a href="/ShowView">展示页</a></li>
  <li class="list-group-item list-group-item-action list-group-item-primary">按a-z字母顺序排序</li>
  <li class="list-group-item list-group-item-action list-group-item-primary">按更新日期排序</li>
  <li class="list-group-item list-group-item-action list-group-item-primary"><a href="/AdminView/libaryadmin/quickadd">快速新增</a></li>
</ul>
                </div>
                </div>
                <main class="col-12 col-md-9 col-xl-10 py-md-3 pl-md-5 bd-content">
                   <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">资料名</th>
      <th scope="col">操作</th>
    </tr>
  </thead>
  <tbody id="content">
     </tbody>
</table> 
                </main>
            </div>
        </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

  </body>
<script type="text/javascript">
    $("#mymenu").click(function(){
        //$('.sidebar_list').css('display','block') ;
        $('.sidebar_list').fadeToggle(1000);
    })
 $.post('/ShowView/information/content',
                    {
                        'method':'getcontent',
                        '_token':"{{ csrf_token() }}"
                    },
                    function(data,status){
                      //  console.log(data);
                        data = JSON.parse(data);
                        for (const key in data) {
                                val = data[key];
                                console.log(val);
                                var id = val["id"];
                                var name = val["name"];
                                htm = "<tr><td scope='row'>"+id+"</td>"+
                                           "<td><a href='#'>"+name+"</a></td>"+
                                           "<td><div class='btn-group' role='group'>"+
                                                "<button id='method' type='button' class='btn btn-primary btn-sm'>快速编辑</button>"+
                                                "</div>"+
                                            "</td>"+
                                      "</tr>";
                                $('#content').prepend(htm);
                            
                        }
                    });
    


</script>
 
</html>