<h2 class="custom_header">Combat Helper</h2>
<h3 class="custom_header"><i><?php echo $scenario_info->scenario_name?></i></h3>
<div class="description_scroll"><?php echo $scenario_info->description?></div>

  <table class="table table-striped">
  <tbody  data-bind="foreach: NPClist">
  <tr data-bind="css: { 'table-danger':NPC_dead}">
    <td>
      <div><b>Race: </b><span  data-bind="text: NPCrace"></span></div>
      <div><b>Class: </b><span  data-bind="text: NPCclass"></span></div>
      <div><b>Name: </b><span  data-bind="text: NPCname"></span></div>
      <div><b>Level: </b><span  data-bind="text: NPClvl"></span></div>
    </td>
    <td>
      <select class="custom-select" id="'sel_weap' + NPCnumber" data-bind="options: NPCweapons, value: NPCsel_weap">
      </select>
      <div class="small_armor"><b>Armor: </b><span data-bind="text: NPCarmor"></span></div>
      <div>
        <div class="small_armor">
          <input class="lvl extra more" type="checkbox" data-bind="checked: NPC_helm">Helmet
          <input class="lvl extra shield" type="checkbox" data-bind="checked: NPC_shield">Shield
        </div>
        <div>
          <input class="lvl extra more" type="checkbox" data-bind="checked: NPC_arm">Arm armor
          <input class="lvl extra" type="checkbox" data-bind="checked: NPC_leg">Leg armor
        </div>
      </div>
    </td>
    <td>
        <div>
          <b>OB: </b><span data-bind="text: NPCprim_weap_use() ? NPCAttBon_pri : NPCAttBon_sec"></span> / <span data-bind="text: NPCprim_weap_use() ? NPCob_orig_pri : NPCob_orig_sec"></span>
        </div>
        <div>
          <b>DB: </b><span data-bind="text: NPCDefBon"></span><span data-bind="if: NPC_shield"><span data-bind="text: ' (shield) / ' + ( NPCDefBon() - 25)"></span></span>
        </div>
      <div>
        <input type="number" min=0 max=1000 class="lvl" data-bind="attr:{ id: 'penalty' + NPCnumber }"><button type="button" class="btn btn-secondary" data-bind="click:$parent.Penalize, ">Penalty</button>
      </div>
      <div>
        <input type="number" min=0 max=1000 class="lvl" data-bind="attr:{ id: 'defence' + NPCnumber }"><button type="button" class="btn btn-secondary" data-bind="click: $parent.Defend">Defence</button>
      </div>
    </td>
    <td>
      <div>
        <b>HP: </b><span data-bind="text: NPChp"></span> / <span data-bind="text: NPChp_orig"></span>
      </div>
      <div>
        <input type="number" min=0 class="lvl" data-bind="attr:{ id: 'damage' + NPCnumber }">
        <button type="button" class="btn btn-secondary" data-bind="click:$parent.Damage">Damage</button>
      </div>
      <div>
        <input type="number" min=0 class="lvl" data-bind="attr:{ id: 'heal' + NPCnumber }">
        <button type="button" class="btn btn-secondary" data-bind="click:$parent.Heal">Heal</button>
      </div>
    </td>
  </tr>
</tbody>
</table>
<script type="text/javascript">
const CombatHelper = new CombatviewModel();
<?php
      if (count($npcs) > 0) {
        foreach ($npcs as $row) {
          echo 'CombatHelper.NPClist.push( new NPC("'.$row['name'].'", "'.$row['race'].'", "'.$row['class'].'",
          '.$row['level'].','.$row['offensive_primary'].','.$row['offensive_secondary'].','
          .$row['defensive_bonus'].','.$row['hit_points'].',"'.$row['armor'].'",['
          .$row['shield'].','.$row['helmet'].','.$row['arm_armor'].','.$row['leg_armor'].'],
          ["'.$row['primary_weapon'].'","'.$row['secondary_weapon'].'"]));';
        }
      }
?>
    ko.options.deferUpdates = true;
    ko.applyBindings( CombatHelper );
</script>
