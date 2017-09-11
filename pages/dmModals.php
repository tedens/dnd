<div id="giveGold" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Give gold to character(s)</h4>
            </div>
            <div class="modal-body">
                <p>Select which characters are receiving gold and how much.</p>
            </div>
            <form style="margin: 5px 20px;">
                <label>
                    Gold Amount:
                </label>
                <input id="goldAmount" name="goldAmount" required onkeypress="return event.keyCode!=13"><br/>
                <select id="goldList" multiple required>
                    <?php
                    foreach ($users as $user){
                        $user = substr($user, 0, -5);
                        echo "<option value=\"$user\">$user</option>";
                    };
                    ?>
                </select>
                <br>
                <br>
                <button id="saveGold" type="button" class="btn btn-info">Save</button>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<div id="giveStat" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add stats to a character</h4>
            </div>
            <div class="modal-body">
                <p>Select which character is receiving a stat addition</p>
            </div>
            <form style="margin: 5px 20px;">
                <label>
                    Stat Amount:
                </label>
                <input id="addStat" name="addStat" required onkeypress="return event.keyCode!=13">
                <select id="stat">
                <?php
                foreach($template->stats as $key => $value){
                    echo "<option value='$key'>$key</option>";
                }
                 ?>
               </select>
                <br/>
                <label>
                  Player:
                </label>
                <select id="statPlayers" required>
                    <?php
                    foreach ($users as $user){
                        $user = substr($user, 0, -5);
                        echo "<option value=\"$user\">$user</option>";
                    };
                    ?>
                </select>
                <br>
                <br>
                <button id="saveStat" type="button" class="btn btn-info">Save</button>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<div id="giveExp" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Give exp to character(s)</h4>
            </div>
            <div class="modal-body">
                <p>Select which characters are receiving exp and how much.</p>
            </div>
            <form style="margin: 5px 20px;">
                <label>
                    Exp Amount:
                </label>
                <input id="exp" name="exp" required onkeypress="return event.keyCode!=13"><br/>
                <select id="players" multiple required>
                    <?php
                    foreach ($users as $user){
                        $user = substr($user, 0, -5);
                        echo "<option value=\"$user\">$user</option>";
                    };
                    ?>
                </select>
                <br>
                <br>
                <button id="saveExp" type="button" class="btn btn-info">Save</button>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<div id="manageInv" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Give an item to a character</h4>
            </div>
            <div class="modal-body">
                <p>Provide an item to a charcter.</p>
            </div>
            <form style="margin: 5px 20px;">
                <label for="itemType">
                    Type:
                </label>
                <select id="itemType" required>
                    <?php
                    foreach($template->inv as $key => $item) {
                        echo "<option value='$key'>$key</option>";
                    }
                    ?>
                </select><br /><br />
                <label for="itemName" required>
                    Item name:
                </label>
                <input id="itemName" name="itemName" required onkeypress="return event.keyCode!=13"><br/><br />
                <label for="stat">
                    Stat Modifier (+2):
                </label>
                <select id="mod">
                    <option value="%2B">+</option>
                    <option value="-">-</option>
                </select>
                <input id="statMod" name="statMod" required onkeypress="return event.keyCode!=13">
                <select id="stat" required>
                    <?php
                    foreach($template->stats as $key => $value){
                        echo "<option value='$key'>$key</option>";
                    }

                    ?>
                    <option value="other">Other</option>

                </select>
                <br/> <br />
                <label for="cost">
                    Worth in Gold?:
                </label>
                <input id="cost" name="cost" required onkeypress="return event.keyCode!=13"><br /><br />
                <label for="desc">
                    Item Description:
                </label>
                <input id="desc" name="desc" required onkeypress="return event.keyCode!=13"><br><br>
                <label for="playerList">
                    Player Name:
                </label>
                <select id="playerList" required>
                    <?php
                    foreach ($users as $user){
                        $user = substr($user, 0, -5);
                        echo "<option value=\"$user\">$user</option>";
                    };
                    ?>
                </select>
                <br>
                <br>
                <button id="saveItem" type="button" class="btn btn-info">Save</button>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<div id="modHealth" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Give/Take HP from character(s)</h4>
            </div>
            <div class="modal-body">
                <p>Select which characters are receiving or losing HP.</p>
            </div>
            <form style="margin: 5px 20px;">
                <label>
                    HP Amount:
                </label>
                <input id="hp" name="hp" required onkeypress="return event.keyCode!=13"><br/>
                <select id="playerHpList" multiple required>
                    <?php
                    foreach ($users as $user){
                        $user = substr($user, 0, -5);
                        echo "<option value=\"$user\">$user</option>";
                    };
                    ?>
                </select>
                <br>
                <br>
                <button id="saveHp" type="button" class="btn btn-info">Save</button>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<div id="toggleRest" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Sets the mode into/out of rest mode</h4>
            </div>
            <div class="modal-body">
                <p>Rest mode will heal all characters back to full health and allow them to select spells, sell items, etc. Only use this in towns/campfire rests. Obviously not during battle.</p>
            </div>
            <form style="margin: 5px 20px;">
                <label>
                    Rest Mode Status: <?php  if ($restMode === true){ echo "On"; } else { echo "Off";}?>
                </label><br />
                <input type="radio" name="restMode" value="1" <?php if ($restMode === true){ echo "checked"; }?> > On<br>
                <input type="radio" name="restMode" value="0" <?php if ($restMode === false){ echo "checked"; } ?>> Off<br>
                <br>
                <br>
                <button id="saveRestMode" type="button" class="btn btn-info">Save</button>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
