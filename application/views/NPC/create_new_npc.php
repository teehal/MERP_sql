<form action="<?php echo site_url('NPC/add_npc_to_db');?>" method="POST">
<div class="container-fluid">
<div class="row">
<div class="col-6">
<div class="npc_selectors">
    <select class="custom-select" name="class" id="npcclass" data-bind="options: AvailableClasses, value:char_class, optionsCaption: 'NPC Class' "></select>
    <select class="custom-select" name="race" id="npcrace" data-bind="options: AvailableRaces, optionsCaption: 'NPC Race', enable: char_class(), value:char_race" ></select>
    <select class="custom-select" id="primweap" data-bind="options: Weapons, optionsCaption: 'Primary Weapon', enable: char_race(), value:char_1stw"></select>
    <select class="custom-select" id="secweap" data-bind="options: Weapons, optionsCaption: 'Secondary Weapon', enable: char_1stw(), value:char_2stw"></select>
    <select class="custom-select" id="armor" data-bind="options: Armor, optionsCaption: 'Armor', enable: char_1stw(), value:char_armor"></select>
</div>
<div class="clear_float"></div>
 <div class="input-group">
   <div class="test_gropup">
    <label class="lbl_npc" for="npclvl">Level</label>
    <input class="lvl" name="level" type="number" id="npclvl" value=1 min=1 max=200 data-bind="value: char_lvl">
    <label class="lbl_npc" for="npcdef"><b>DB</b></label>
    <input class="lvl" type="number" id="npcdef" value=0 min=-200 max=200 data-bind="value: char_db">
    <label class="lbl_npc" for="npchp"><b>HP:</b></label>
    <input class="lvl" type="number" id="npchp" value=0 min=0 max=1000 data-bind="value:char_hp">
    <label class="lbl_npc" for="npcofb"><b>OB</b></label>
    <input class="lvl" type="number" id="npcofb" value=0 min=-200 max=200 data-bind="enable: char_1stw(), value: char_1stw() ? char_ob_pri : ''"><span> Primary</span>
    <input class="lvl extra shld" type="checkbox" id="shield">Shield
    <input class="lvl extra hlmt" type="checkbox" id="helmet">Helmet
    </div>
</div>
  <div class="name_tag">
    <label class="lbl_npc" for="npcname">Name</label>
      <input class="lvl name" name="name" type="text" value="noname1" id="npcname">
      <label class="lbl_npc" for="npcofb_sec"><b>OB</b></label>
      <input class="lvl" type="number" id="npcofb_sec" value=0 min=-200 max=200 data-bind="enable: char_2stw() , value: char_2stw() ? char_ob_sec : ''"><span> Secondary</span>
      <input class="lvl extra" type="checkbox" id="larmor">Leg Armor
      <input class="lvl extra" type="checkbox" id="aarmor">Arm Armor
  </div>
</div>
<div class="col-2">
  <div class="skill_list">
    <table class="table-striped">
    <tbody data-bind="foreach: NPCSkills">
    <tr>
      <td>
        <label class="lbl_npc"  data-bind="text: SkillName"></label>
      </td>
      <td>
        <input class="lvl" type="number" data-bind="value: SkillBonus">
      </td>
      <td>
        <button class="tiny_button" data-bind="click: $parent.RemoveSkill">X</button>
    </tr>
  </tbody>
  </table>
  </div>
  <input id="skill_name" class="lvl skill" type="text" placeholder="Skill name">
  <input id="skill_bonus" class="lvl" type="number">
  <button type="button" class="btn btn-primary btn-sm add" data-bind="click: AddSkill">Add</button>
</div>
<div class="col-3">
  <div class="input-group background">
    <div class="input-group-prepend">
      <span class="input-group-text">Background</span>
    </div>
    <textarea class="form-control" name="background" aria-label="With textarea" value="Nothing here yet!"></textarea>
  </div>
</div>
</div>
</div>
<input type="submit" class="btn btn-success add" value="Add to database" data-bind="enable:char_class() && char_1stw() && Number(char_hp()) > 0 && char_armor()">
</form>
<script type="text/javascript">
    ko.options.deferUpdates = true;
    ko.applyBindings( new viewModel() );
</script>
