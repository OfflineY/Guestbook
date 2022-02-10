<?php
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title_min; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<header>

<div
  class="d-flex flex-column flex-md-row align-items-center fixed-top p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
  <h5 class="my-0 mr-md-auto font-weight-normal">
    <div class="container d-flex justify-content-between">
      <a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" title="<?php echo $project_introduction; ?>" class="navbar-brand d-flex align-items-center">
        <strong><?php echo $title; ?></strong>
      </a>
    </div>
  </h5>
</div>
</header>
    <br>
    <main class="mt-4 container py-5">
    <section class="jumbotron text-center bg-white">
            <div class="card-body">
                <h3 class="card-title fw-bolder"><?php echo $lead_title; ?></h3>
                <p class="card-text"><?php echo $lead_info; ?></p>
                <button class="btn btn-primary w-100 fw-bolder" data-bs-toggle="modal" data-bs-target="#exampleModal"><?php echo $lead_button; ?></button>
            </div>
            </section>
        <div class="modal fade" id="exampleModal" tabindex="-1"  aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bolder" id="exampleModalLabel"><?php echo $lead_title; ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <form action="add.php" method="GET">
                                <label for="exampleFormControlInput1" class="form-label"><?php echo $form_name; ?></label>
                                <input type="text" class="form-control" name="n" id="exampleFormControlInput1" required="required" placeholder="<?php echo $form_name_input; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label"><?php echo $form_info; ?></label>
                            <textarea class="form-control" name="t" id="floatingTextarea2" style="height:300px" required="required" placeholder="<?php echo $form_info_textarea; ?>"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100"><?php echo $form_send; ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <h3 class="fw-bolder"><?php echo $tabulation; ?></h3>
<?php 
            // 最新留言展示前面
            $sql = "SELECT * FROM `LYB_001` ORDER BY `LYB_001`.`id` DESC";
            // ORDER BY `liuyan`.`id` DESC 加上这个是降序排列
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                //输出数据
                while ($row = $result->fetch_assoc()) {
                    // $result->fetch_assoc()执行一次显示第一条，执行第二次显示第二条?>
            <div class="card  mt-3 mb-3 shadow-sm">
                <div class="card-body">
                    <button type="button" class="btn btn-sm btn-outline-primary float-end p-2 py-0" id="hand"><i class="fa fa-hand-paper-o"></i> 击掌</button>
                    <h5 class="card-title fw-bold"> <?php echo $row["name"]; ?> 说：</h5>
                    <p class="card-text"> <?php echo $row["text"]; ?> </p>
                    <span class="badge bg-primary float-start">发表ID: <?php echo $row["id"]; ?></span>
                    <span class="float-end text-muted badge"><a href="#" class="text-decoration-none">最后由 <?php echo $row["name"]; ?> 编辑</a> <?php echo $row["time"]; ?></span>
                </div>
            </div>
            <!--<a href="edit.php?id=<?php echo $row['id']; ?>">编辑</a><a href="del.php?id=<?php echo $row['id']; ?>">删除</a>-->
<?php
                }
            } else {
                echo "暂无留言";
            }?>
        </div>
    </main>
    <footer class="bd-footer py-5 bg-light">
  <div class="container py-5">
    <div class="row">
      <div class="mb-3">
        <a class="d-inline-flex align-items-center mb-2 link-dark text-decoration-none" href="#" aria-label="Bootstrap">
            <span class="fs-5 fw-bold"><?php echo $title; ?></span> 
        </a>
        <p class='text-muted fw-normal' style='font-size:12px'>Powered by YuanYuBo, Code licensed MIT.</p>
        <ul class="list-unstyled small text-muted">
          <li class="mb-2"><?php echo $project_introduction; ?></li>
        </ul>
      </div>
    </div>
  </div>
</footer>
</body>
<style>
    img{
        width: 100%;
        padding: 5px 0;
        border-radius: 8px;
    }
</style>
<link href="https://cdn.bootcdn.net/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
window.onload = function () {
  setTimeout(
    function () {
      $("#load").html("<i class='fa fa-wrench'></i>");
    }, 2000);
};
$('#hand').click(function() {
    $("#hand").html("<i class='fa fa-hand-peace-o'></i> 已击掌").attr("class","btn btn-sm btn-primary float-end p-2 py-0").attr("disabled",true);
});
var tooltipTriggerList = Array.prototype.slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})
</script>
</html>