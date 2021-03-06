<!-- Modal -->
<div id="setName" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Set Character Name</h4>
            </div>
            <div class="modal-body">
                <p>Be sure your name is spelled correctly as you can only change it once per character.</p>
            </div>
            <form style="margin: 5px 20px;">
                <label>
                    First Name:
                </label>
                <input id="firstName" name="firstName" required onkeypress="return event.keyCode!=13" />
                <br>
                <label>
                    Last Name:
                </label>
                <input id="lastName" name="lastName" required onkeypress="return event.keyCode!=13" />
                <br>
            </form>
            <div class="modal-footer">
              <button id="saveName" type="button" class="btn btn-info save" data-uname="<?php echo $uname; ?>">Save</button>

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<!-- Modal -->
<div id="rollDice" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Roll Dice</h4>
            </div>
            <div class="modal-body">
                <p>What you roll will be logged for other players and the DM to see.</p>
            </div>
            <form style="margin: 5px 20px;">
                <span id="diceResult">

                </span><br>
                <label>
                    Type of dice:
                </label>
                <select id="diceType" required>
                    <option value="20">D20</option>
                    <option value="12">D12</option>
                    <option value="10">D10</option>
                    <option value="8">D8</option>
                    <option value="6">D6</option>
                    <option value="4">D4</option>
                    <option value="body">Body Dice</option>
                </select>
                <br>
                <label>
                    How many times?
                </label>
                <input id="rollAmount" name="rollAmount" required onkeypress="return event.keyCode!=13" />
                <br>
                <label>
                    What is the roll for?
                </label>
                <input id="rollMemo" name="rollMemo" required onkeypress="return event.keyCode!=13" />
                <br>
            </form>
            <div class="modal-footer">
              <button id="saveRollDice" type="button" class="btn btn-info save" data-uname="<?php echo $uname; ?>">Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<!-- Modal -->
<div id="setAge" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Set Character Age</h4>
            </div>
            <div class="modal-body">
                <p>Please set the age of your character.</p>
            </div>
            <form style="margin: 5px 20px;">
                <label>
                    Age:
                </label>
                <input id="age" name="age" required onkeypress="return event.keyCode!=13" />
                <br>
            </form>
            <div class="modal-footer">
              <button id="saveAge" type="button" class="btn btn-info save" data-uname="<?php echo $uname; ?>">Save</button>

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<!-- Modal -->
<div id="addNote" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add a note</h4>
            </div>
            <div class="modal-body">
                <p>Add a note to your character sheet.</p>
            </div>
            <form style="margin: 5px 20px;">
                <label>
                    Note:
                </label>
                <textarea cols="50" rows="10" id="note" name="note" onkeypress="return event.keyCode!=13" /></textarea>
                <br>
            </form>
            <div class="modal-footer">
              <button id="saveNote" type="button" class="btn btn-info save" data-uname="<?php echo $uname; ?>">Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="addSkill" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add a skill</h4>
            </div>
            <div class="modal-body">
                <p>You may add a skill to your character abilities.</p>
            </div>
            <form style="margin: 5px 20px;">
                <label>
                    Skill:
                </label>
                <select id="skill" required>
                  <?php
                    foreach ($skillSet['skills'] as $skill => $attr ){
                      echo "<option>$skill ($attr)</option>";
                    }
                  ?>
                </select>
                <br>
            </form>
            <div class="modal-footer">
              <button id="saveSkill" type="button" class="btn btn-info save" data-uname="<?php echo $uname; ?>">Save</button>

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<!-- Modal -->
<div id="addSpell" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add a spell</h4>
            </div>
            <div class="modal-body">
                <p>You may add a spell to your characters spell list only during a rest mode.</p>
            </div>
            <form style="margin: 5px 20px;">
                <label>
                    Spell Level:
                </label>
                <select id="spellLvl" required>
                  <option>0</option>
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                  <option>6</option>
                  <option>7</option>
                  <option>8</option>
                  <option>9</option>
                </select>
                <br>
                <label>
                  Spell Name:
                </label>
                <input id="spellName" name="spellName" required onkeypress="return event.keyCode!=13" />
                <br>
                <label>
                  Spell Desc:
                </label>
                <input id="spellDesc" name="spellDesc" value="Copy from PDF please" required onkeypress="return event.keyCode!=13" />
                <br>
            </form>
            <div class="modal-footer">
              <button id="saveSpell" type="button" class="btn btn-info save" data-uname="<?php echo $uname; ?>">Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<!-- Modal -->
<div id="setGender" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Set Character Gender</h4>
            </div>
            <div class="modal-body">
                <p>Please set the gender of your character.</p>
            </div>
            <form style="margin: 5px 20px;">
                <label>
                    Gender:
                </label>
                <select id="gender" required>
                    <option>Male</option>
                    <option>Female</option>
                    <option>Other</option>
                </select>
                <br>
            </form>
            <div class="modal-footer">
              <button id="saveGender" type="button" class="btn btn-info save" data-uname="<?php echo $uname; ?>">Save</button>

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>


<!-- Modal -->
<div id="setAlign" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Set Character Alignment</h4>
            </div>
            <div class="modal-body">
                <p>This can only be changed once.</p>
            </div>
            <form style="margin: 5px 20px;">
                <label>
                    Alignment:
                </label>

                <select id="alignSelect" required>
                    <option>
                        Lawful Good
                    </option>
                    <option>
                        Neutral Good
                    </option>
                    <option>
                        Chaotic Good
                    </option>
                    <option>
                        Lawful Neutral
                    </option>
                    <option>
                        Neutral
                    </option>
                    <option>
                        Chaotic Neutral
                    </option>
                    <option>
                        Lawful Evil
                    </option>
                    <option>
                        Neutral Evil
                    </option>
                    <option>
                        Chaotic Evil
                    </option>

                </select>

                <br>
            </form>
            <div class="modal-footer">
              <button id="saveAlign" type="button" class="btn btn-info save" data-uname="<?php echo $uname; ?>">Save</button>

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<!-- Modal -->
<div id="setRace" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Set Character Race</h4>
            </div>
            <div class="modal-body">
                <p>This can only be changed once.</p>
            </div>
            <form style="margin: 5px 20px;">
                <label>
                    Race:
                </label>

                <select id="race" required>
                    <option>Dragonborn</option>
                    <option>Dwarf</option>
                    <option>Elf</option>
                    <option>Gnome</option>
                    <option>Half-Elf</option>
                    <option>Half-Orc</option>
                    <option>Hafling</option>
                    <option>Human</option>
                    <option>Lizard-Folk</option>
                    <option>Tiefling</option>
                </select>

                <br>
            </form>
            <div class="modal-footer">
              <button id="saveRace" type="button" class="btn btn-info save" data-uname="<?php echo $uname; ?>">Save</button>

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<!-- Modal -->
<div id="setClass" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Set Character Class</h4>
            </div>
            <div class="modal-body">
                <p>This can only be changed once.</p>
            </div>
            <form style="margin: 5px 20px;">
                <label>
                    Race:
                </label>

                <select id="class" required>
                    <option>Barbarian</option>
                    <option>Bard</option>
                    <option>Cleric</option>
                    <option>Druid</option>
                    <option>Fighter</option>
                    <option>Monk</option>
                    <option>Paladin</option>
                    <option>Ranger</option>
                    <option>Rogue</option>
                    <option>Sorcerer</option>
                    <option>Warlock</option>
                    <option>Wizard</option>
                </select>

                <br>
            </form>
            <div class="modal-footer">
              <button id="saveClass" type="button" class="btn btn-info save" data-uname="<?php echo $uname; ?>">Save</button>

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<!-- Modal -->
<div id="newUser" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Create a new user</h4>
            </div>
            <div class="modal-body">
                <p>Please type in a user that everyone will recognize it is you. (This is not your characters name)</p>
            </div>
            <form style="margin: 5px 20px;">
                <label>
                    Username:
                </label>
                <input id="username" name="username" required onkeypress="return event.keyCode!=13" />
                <br>
            </form>
            <div class="modal-footer">
              <button id="saveUser" type="button" class="btn btn-info save">Save</button>

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<!-- Modal -->
<div id="tradeItem" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Transfer items to another player.</h4>
            </div>
            <div class="modal-body">
                <p>Please select the item and player to send the trade.</p>
            </div>
            <form style="margin: 5px 20px;">
                <label>
                    Players:
                </label>
                <select id="tradeList" required>
                  <?php
                  foreach ($users as $tradeUser){
                    $tradeUser = substr($tradeUser, 0, -5);
                    echo "<option value=\"$tradeUser\">$tradeUser</option>";
                  };
                  ?>
                </select>
                <br>
                <label>
                    Item:
                </label>
                <select id="itemToTrade">
                  <?php
                      foreach($user['bag'] as $item) {
                        echo '<option value="'.$item['name'].'">'.$item['name'].'</option>';
                      }

                   ?>
                </select>
                <br>
            </form>
            <div class="modal-footer">
              <button id="tradeItemButton" type="button" class="btn btn-info save" data-uname="<?php echo $uname; ?>">Trade</button>

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<!-- Modal -->
<div id="tradeGold" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Transfer gold to another player.</h4>
            </div>
            <div class="modal-body">
                <p>Please select the amount of gold and player to send the trade.</p>
            </div>
            <form style="margin: 5px 20px;">
                <label>
                    Players:
                </label>
                <select id="goldTradeList" required>
                  <?php
                  foreach ($users as $tradeUser){
                    $tradeUser = substr($tradeUser, 0, -5);
                    echo "<option value=\"$tradeUser\">$tradeUser</option>";
                  };
                  ?>
                </select>
                <br>
                <label>
                    Gold Amount:
                </label>
                <input id="tradeGoldAmount">
                <br>
            </form>
            <div class="modal-footer">
              <button id="tradeGoldButton" type="button" class="btn btn-info save" data-origGold="<?php echo $gold; ?>" data-uname="<?php echo $uname; ?>">Trade</button>

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
