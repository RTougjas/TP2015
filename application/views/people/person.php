<div class="col-md-2 col-sm-4"></div>
<div class="container">
	<div class="panel panel-default">
  	  	<div class="panel-body">
            <table class="table">
                <br>
                <ul class="list-group">
                    <li class="list-group-item" style="word-wrap:break-word">
                        <?php echo "<h3>".$info->name."</h3>";?>
                            <?php if($this->ion_auth->is_admin()) { ?>
                            <a class="btn btn-info" href="<?php echo site_url("edit/edit_person/".$info->id);?>">Muuda Andmeid</a>
                            <?php } ?>
                    </li>
                    <?php if($info->name != ''){ ?>
                        <li class="list-group-item">Nimi: <?php echo '<b>'.$info->name.'</b>';?></li>
                    <?php } ?>
                    <?php if($info->birthday != ''){ ?>
                        <li class="list-group-item">Sünniaeg <?php echo '<b>'.$info->birthday.'</b>';?></li>
                    <?php } ?>
                    <?php if($info->location != ''){ ?>
                        <li class="list-group-item">Elukoht <?php echo '<b>'.$info->location.'</b>';?></li>
                    <?php } ?>
                </ul>
                    <?php if ($info->enabled == 't'){?>
                    <div class="panel-group">
                        <ul class="list-group">
                            <div class="panel-body" style="text:word-wrap"><b>Elulugu</b></div>
                            <li class="list-group-item" style="word-wrap:break-word">
                                <?php if($info->life != ''){ ?>
                                    <div class="panel-body" style="text:word-wrap"><?php echo $info->life; ?></div>
                                <?php } ?>
                                <?php for($i = 0; $i < count($story); ++$i){?>
                                        <div class="panel-body" style="text:word-wrap"><?php echo $story[$i]->comment; ?></div>
                                    <?php }?>
                            <?php } else { ?>
                                <div class="panel-group">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                Eluloo kuvamine on selle isiku jaoks väljalülitatud.
                                            </h4>
                                      </div>	
                                    </div>
                                </div>
                                <?php }?>
                            </li>
                        </ul>
                            </div>
                        </div>
                    </div>
                    <?php if($this->ion_auth->logged_in() && $info->enabled == 't') {?>
                        <?php echo form_open('profile/add_story/'.$this->uri->segment(3, 1));?>
                        <div class="form-group">
                            <form>
                                <label for="comment">Lisa eluloole:</label>
                                <textarea class="form-control" type="text" rows="5" id="comment" name="comment"></textarea>
                                <br>
                                <input type="submit" class="btn btn-primary" value="Lisa">
                            </form>
                        </div>
                    <?php } ?>
            </table>
				<br>
                </div>
  			</div>
	</div>
</div>
<div class="col-md-2 col-sm-4"></div>
