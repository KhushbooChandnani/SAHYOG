//This is the file for donate.php::::







<?php //require_once('../../includes/bootstrap.php');?>

<div class="middle_inner">
    <div class="content_wrap fullwidth">

        
        <div class="middle_content entry">
            <div id="cmsmasters_row_"
                class="cmsmasters_row cmsmasters_color_scheme_default cmsmasters_donation_form_wrapper cmsmasters_row_top_default cmsmasters_row_bot_default cmsmasters_row_boxed">
                <div class="cmsmasters_row_outer_parent">
                    <div class="cmsmasters_row_outer">
                        <div class="cmsmasters_row_inner">
                            <div class="cmsmasters_row_margin cmsmasters_11">
                                <div id="cmsmasters_column_" class="cmsmasters_column one_first">
                                    <div class="cmsmasters_column_inner">
                                        <form action="<?php echo BASELANDING;?>helper/donation_routing.php"
                                            method="post" id="submit-donation-form" class="cmsmasters_donations_form"
                                            enctype="multipart/form-data">
                                            <div class="cmsmasters_donation_fields">
                                                <h2 class="cmsmasters_donation_form_title">Donation details</h2>
                                                <div class="cmsmasters_donation_field donation-donation_amount">
                                                    <label for="donation_amount">Donation Amount <span class="color_2">*</span></label>
                                                    <p></p>
                                                    <div class="field_inner"><input type="text" name="donation_amount"
                                                            id="donation_amount" value="" class=""
                                                            placeholder="or enter your own donation amount, e.g: 85"
                                                            maxlength=""></div>
                                                </div>
                                                <div class="cmsmasters_donation_field donation-donation_campaign">
                                                    <label for="donation_campaign">Events</label>
                                                    <p></p>
                                                    <div class="field_inner"><select name="event_id"
                                                            id="donation_campaign">
                                                            <option value="0">No specific campaign</option>
                                                        </select><small class="description">Select the campaign you would like to contribute to</small></div>
                                                </div>
                                                <div class="cmsmasters_donation_field donation-donation_message">
                                                    <label for="donation_message">Message</label>
                                                    <p></p>
                                                    <div class="field_inner"><textarea name="donation_message"
                                                            id="donation_message" cols="30" rows="7"
                                                            placeholder="Your custom message text..."></textarea>
                                                    </div>
                                                </div>
                                                <div class="cmsmasters_donation_field donation-anonymous_donation">
                                                    <label for="anonymous_donation">Anonymous donation?</label>
                                                    <p></p>
                                                    <div class="field_inner"><input type="checkbox"
                                                            name="anonymous_donation" id="anonymous_donation"
                                                            value="true"><small class="description">Check this box
                                                            to
                                                            hide your personal info in our donators list</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <button type="submit" name="submit_donation">Donate Now !</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cl"></div>
        </div>
        



    </div>
</div>




//End of donate.php file