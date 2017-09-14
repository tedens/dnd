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
                <button id="saveName" type="button" class="btn btn-info" data-uname="<?php echo $uname; ?>">Save</button>
            </form>
            <div class="modal-footer">
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
                <button id="saveAge" type="button" class="btn btn-info" data-uname="<?php echo $uname; ?>">Save</button>
            </form>
            <div class="modal-footer">
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
                    Age:
                </label>
                <input id="gender" name="gender" required onkeypress="return event.keyCode!=13"/>
                <br>
                <button id="saveGender" type="button" class="btn btn-info" data-uname="<?php echo $uname; ?>">Save</button>
            </form>
            <div class="modal-footer">
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
                <button id="saveAlign" type="button" class="btn btn-info" data-uname="<?php echo $uname; ?>">Save</button>
            </form>
            <div class="modal-footer">
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
                <button id="saveRace" type="button" class="btn btn-info" data-uname="<?php echo $uname; ?>">Save</button>
            </form>
            <div class="modal-footer">
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
                <button id="saveClass" type="button" class="btn btn-info" data-uname="<?php echo $uname; ?>">Save</button>
            </form>
            <div class="modal-footer">
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
                <button id="saveUser" type="button" class="btn btn-info">Save</button>
            </form>
            <div class="modal-footer">
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
                <button id="tradeItemButton" type="button" class="btn btn-info" data-uname="<?php echo $uname; ?>">Trade</button>
            </form>
            <div class="modal-footer">
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
                <button id="tradeGoldButton" type="button" class="btn btn-info" data-origGold="<?php echo $gold; ?>" data-uname="<?php echo $uname; ?>">Trade</button>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
