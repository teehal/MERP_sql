function CreateNewNpcViewModel() {
    this.char_class = ko.observable();
    this.char_lvl = ko.observable(1);
    this.char_race = ko.observable();
    this.char_1stw = ko.observable();
    this.char_armor = ko.observable();
    this.char_hp = ko.pureComputed( () => { let i = getSkills(this.char_lvl(), this.char_class())[0];
                                        return i;}, this);
    this.char_db = ko.pureComputed( () => { let i = getSkills(this.char_lvl(), this.char_class())[1];
                                        return i;}, this);
    this.char_ob_pri = ko.pureComputed( () => { let i = getSkills(this.char_lvl(), this.char_class())[2];
                                        return i;}, this);
    this.char_ob_sec = ko.pureComputed( () => { let i = getSkills(this.char_lvl(), this.char_class())[3];
                                        return i;}, this);
    this.char_2stw = ko.observable();
    this.AvailableClasses = ko.observableArray(Classes);
    this.AvailableRaces = ko.observable(Races);
}

function CombatviewModel() {
    this.NPC_dead = true;
    this.create_new = ko.observable(false);
    this.NPClist = ko.observableArray();
    this.char_class = ko.observable();
    this.char_lvl = ko.observable(1);
    this.char_race = ko.observable();
    this.char_1stw = ko.observable();
    this.char_armor = ko.observable();
    this.char_hp = ko.pureComputed( () => { let i = getSkills(this.char_lvl(), this.char_class())[0];
                                        return i;}, this);
    this.char_db = ko.pureComputed( () => { let i = getSkills(this.char_lvl(), this.char_class())[1];
                                        return i;}, this);
    this.char_ob_pri = ko.pureComputed( () => { let i = getSkills(this.char_lvl(), this.char_class())[2];
                                        return i;}, this);
    this.char_ob_sec = ko.pureComputed( () => { let i = getSkills(this.char_lvl(), this.char_class())[3];
                                        return i;}, this);
    this.char_2stw = ko.observable();

    this.Damage = (NPC) => {
        let dmg = document.getElementById('damage' + NPC.NPCnumber).value;
        NPC.NPChp( NPC.NPChp() - dmg);

        if ( NPC.NPChp() <= 0 )
          NPC.NPC_dead(true);
    };

    this.Heal = (NPC) => {
      let hl = document.getElementById('heal' + NPC.NPCnumber).value;
      let hp_hl = NPC.NPChp() + Number(hl);
      NPC.NPChp( (hp_hl > NPC.NPChp_orig) ? NPC.NPChp_orig : hp_hl );
      if ( NPC.NPChp() > 0 && NPC.NPC_dead ) {
        NPC.NPC_dead(false);
      }
    };

    this.Defend = (NPC) => {
      let d = Number(document.getElementById('defence' + NPC.NPCnumber).value);
      let i = NPC.NPCdb();
      let j = NPC.NPCprim_weap_use() ? NPC.NPCob_pri() : NPC.NPCob_sec();
      if ( d == 0 || isNaN(d) ) {
        NPC.NPCdb( Number(NPC.NPCdb_orig) );
        NPC.NPCob_pri( (i - NPC.NPCdb()) + NPC.NPCob_pri() );
        NPC.NPCob_sec( (i - NPC.NPCdb()) + NPC.NPCob_sec() );
        return;
      }
      if ( d > j ) {
        if ( j <= 0 ) {
          d = 0;
        }
        else {
          d = j;
        }
      }
      NPC.NPCdb( d + i );
      NPC.NPCob_pri( NPC.NPCob_pri() - d );
      NPC.NPCob_sec( NPC.NPCob_sec() - d );
    };

    this.Penalize = (NPC) => {
      let d = Number(document.getElementById('penalty' + NPC.NPCnumber).value);
      let i = NPC.NPCdb();
      let j = NPC.NPCob_pri();
      let j_s = NPC.NPCob_sec();
      let k = Number(NPC.NPCob_orig_pri);
      let k_s = Number(NPC.NPCob_orig_sec);
      let l = Number(NPC.NPCdb_orig);
      console.log(" l is i is d " +  l + i + d);
      if ( d == 0 || isNaN(d) ) {
        NPC.NPCob_pri( k - ( i - l ) );
        NPC.NPCob_sec( k_s - ( i - l ) );
        console.log("OB " + NPC.NPCob_pri());
        return;
      }
      if ( j - d < 0 && i - l != 0 ) {
        let tmp = Math.abs(j - d);
        console.log(tmp + " " + l);
        NPC.NPCdb( i - tmp >= l ? i - tmp : l);
        NPC.NPCob_pri( j + ( i - NPC.NPCdb() ) - d );
        NPC.NPCob_sec( j_s + ( i - NPC.NPCdb() ) - d );
        return;
      }
      NPC.NPCob_pri( j - d );
      NPC.NPCob_sec( j_s - d );
    };
}
