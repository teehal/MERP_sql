<h2 class="custom_header">Edit NPC</h2>

<form action="<?php echo site_url('NPC/update_npc_to_db/').$npc_id;?>" method="POST">
<div class="container-fluid">
<div class="row">
<div class="col-6">
<div class="npc_selectors">
  <label for="name">Name</label>
  <input required class="form-control" type="text" name="name" value="<?php echo $npc->name ?>" placeholder="Name">
  <label for="class">Class</label>
  <input required class="form-control" type="text" name="class" value="<?php echo $npc->class ?>" placeholder="Class">
  <label for="race">Race</label>
  <input required class="form-control" type="text" name="race" value="<?php echo $npc->race ?>" placeholder="Race">
</div>
<div class="npc_selectors">
  <label for="primary_weapon">Primary Weapon</label>
  <input required class="form-control" type="text" name="primary_weapon" value="<?php echo $npc->primary_weapon ?>" placeholder="Name">
  <label for="secondary_weapon">Secondary weapon</label>
  <input class="form-control" type="text" name="secondary_weapon" value="<?php echo $npc->secondary_weapon ?>" placeholder="Class">
  <label for="armor">Armor</label>
  <input required class="form-control" type="text" name="armor" value="<?php echo $npc-> armor?>" placeholder="Race">
</div>

<div class="clear_float"></div>
 <div class="input-group">
   <div class="test_gropup">
    <label class="lbl_npc" for="npclvl">Level</label>
    <input class="lvl" name="level" type="number" id="npclvl" value="<?php echo $npc->level ?>" min=1>
    <label class="lbl_npc" for="npcdef"><b>DB</b></label>
    <input class="lvl" name="def_bon" type="number" id="npcdef" value="<?php echo $npc->defensive_bonus ?>" min=-200>
    <label class="lbl_npc" for="npchp"><b>HP:</b></label>
    <input class="lvl" name="hp" type="number" id="npchp" value="<?php echo $npc->hit_points ?>" min=1>
    <label class="lbl_npc" for="npcofb"><b>OB</b></label>
    <input class="lvl" name="ob_pri" type="number" id="npcofb" value="<?php echo $npc->offensive_primary ?>" min=1 ><span> Primary</span>
    <input class="lvl extra shld" name="add_armor[]" value=0 <?php echo $npc->shield == 1 ? 'checked' :'' ?> type="checkbox" id="shield">Shield
    <input class="lvl extra hlmt" name="add_armor[]" value=1 <?php echo $npc->helmet == 1 ? 'checked' :'' ?> type="checkbox" id="helmet">Helmet
    </div>
</div>
  <div class="name_tag">
      <label class="lbl_npc" for="npcofb_sec"><b>OB</b></label>
      <input class="lvl" name="ob_sec" type="number" id="npcofb_sec" value="<?php echo $npc->offensive_secondary ?>" min=-200 max=200><span> Secondary</span>
      <input class="lvl extra" name="add_armor[]" value=2 <?php echo $npc->leg_armor == 1 ? 'checked' :'' ?> type="checkbox" id="larmor">Leg Armor
      <input class="lvl extra" name="add_armor[]" value=3 <?php echo $npc->arm_armor == 1 ? 'checked' :'' ?> type="checkbox" id="aarmor">Arm Armor
  </div>
</div>
<div class="col-3">
  <div class="input-group background">
    <div class="input-group-prepend">
      <span class="input-group-text">Background</span>
    </div>
    <textarea class="form-control" name="background" ><?php echo $npc->background?></textarea>
  </div>
</div>
</div>
</div>
<input type="submit" class="btn btn-success add" value="Update database" >
</form>
