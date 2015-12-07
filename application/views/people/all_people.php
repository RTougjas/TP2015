<div class="container">
<div class="page-header">
  <h1>Isikud</h1>
    <a class="btn btn-success" href="<?php echo site_url("profile/create_person");?>">Loo uus isik</a>  
</div>
<?php for($i = 0; $i < sizeOf($people); $i++) {?>
	<div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <h3 class="panel-title"><a href="<?php echo site_url("profile/person/".$people[$i]->id);?>"><?php echo $people[$i]->name;?></a></h3>
            </div>
        </div>
    </div>
	<?php } ?>
</div>
