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
                <input id="goldAmount" name="goldAmount"><br/>
                <select id="goldList" multiple>
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
                <label>
                    Type:
                </label>
                <select id="itemType">
                    <?php
                    foreach($template->inv as $key => $item) {
                        echo "<option value='$key'>$key</option>";
                    }
                    ?>
                </select><br /><br />
                <label>
                    Item name:
                </label>
                <input id="itemName" name="itemName"><br/><br />
                <label>
                    Stat Modifier (+2):
                </label>
                <input id="statMod" name="statMod">
                <select id="stat">
                    <?php
                    foreach($template->stats as $key => $value){
                        echo "<option value='$key'>$key</option>";
                    }

                    ?>
                    <option value="other">Other</option>

                </select>
                <br/> <br />
                <label>
                    Worth in Gold?:
                </label>
                <input id="cost" name="cost"><br /><br />
                <label>
                    Item Description:
                </label>
                <input id="desc" name="desc"><br><br>
                <label>
                    Player Name:
                </label>
                <select id="players">
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