<style type="text/css">
	.select2-drop-mask{
		z-index: 101;
	}
</style>


<div class="row margin-top-10">
	<form role="search" class="" id="job_search" method="get" >
		<div class="col-md-12">
			<div class="catch-filter pillbox clearfix">
				<ul id="job-search">
					<i class="fa fa-search" style="margin-top: 5px; margin-left: 0px;float:left;margin-right: 10px;"></i>
					<?php
					$get_loc = (isset($_GET['loc'])) ? $_GET['loc'] : array();
					foreach ($get_loc as $loc_value) {
						?>
						<li class="label"><?php echo $loc_value; ?><input type="hidden" name="loc[]" value="<?php echo $loc_value; ?>" /><a class="tag-cls"><i class="fa fa-times"></i></a></li>
						<?php
					}

					$get_jobcategory = (isset($_GET['job_category'])) ? $_GET['job_category'] : array();
					foreach ($get_jobcategory as $jobcategory_value) {
						?>
						<li class="label"><?php echo $jobcategory_value; ?><input type="hidden" name="job_category[]" value="<?php echo $jobcategory_value; ?>" /><a class="tag-cls"><i class="fa fa-times"></i></a></li>
						<?php
					}

					$get_jobtype = (isset($_GET['jobtype'])) ? $_GET['jobtype'] : array();
					foreach ($get_jobtype as $jobtype_value) {
						?>
						<li class="label"><?php echo $jobtype_value; ?><input type="hidden" name="jobtype[]" value="<?php echo $jobtype_value; ?>" /><a class="tag-cls"><i class="fa fa-times"></i></a></li>
						<?php
					}
					?>

					<?php if (isset($_GET['raising_amount_min']) && isset($_GET['raising_amount_max'])) { ?>

						<li class="label raising_range">Raising $<?php echo amountIze($_GET['raising_amount_min']); ?> - $<?php echo amountIze($_GET['raising_amount_max']); ?> <input type="hidden" name="raising_amount_min" value="<?php echo $_GET['raising_amount_min']; ?>" /><input type="hidden" name="raising_amount_max" value="<?php echo $_GET['raising_amount_max']; ?>" /><a class="tag-cls"><i class="fa fa-times"></i></a></li>
					<?php } ?>

					<?php if (isset($_GET['raised_amount_min']) && isset($_GET['raised_amount_max'])) { ?>
						<li class="label raised_range">Raised $<?php echo amountIze($_GET['raised_amount_min']); ?> - $<?php echo amountIze($_GET['raised_amount_max']); ?> <input type="hidden" name="raised_amount_min" value="<?php echo $_GET['raised_amount_min']; ?>" /><input type="hidden" name="raised_amount_max" value="<?php echo $_GET['raised_amount_max']; ?>" /><a class="tag-cls"><i class="fa fa-times"></i></a></li>
					<?php } ?>

					<?php
					$get_keyword = (isset($_GET['keyword'])) ? $_GET['keyword'] : array();
					foreach ($get_keyword as $keyword_value) {
						?>
						<li class="label"><?php echo $keyword_value; ?><input type="hidden" name="keyword[]" value="<?php echo $keyword_value; ?>" /><a class="tag-cls"><i class="fa fa-times"></i></a></li>
						<?php
					}
					?>
					<input type="text" name="keyword[]" class="pillbox-text" placeholder="Search for dream job...">
				</ul>
			</div>
		</div>
	</form>
</div>


<div class="row mbt-s">
	<div class="col-md-12">
		<div class="startup-list-table jobs-filter">

			<ul class="table-col header" style="border-left: 0px; border-right: 0px;">
				<li class="comp-name data-col txt-13">Search Filter:</li>
				<li class="comp-name data-col menu-dropdown classic-menu-dropdown">
					<a href="javascript:;" data-toggle="dropdown" data-close-others="true" data-hover="megamenu-dropdown" class="hover-initialized location-list txt-13">
						Location <i class="fa fa-angle-down"></i>
					</a>
					<div class="dropdown-menu hold-on-click pull-left nmt">
						<select multiple class="form-control select2 select2-offscreen" style="width:250px;" id="loc" name="loc[]" tabindex="-1" placeholder="Search and Select Country / Region">
							<?php
							$sql = "select * from `subregions` ORDER BY subregion ASC";
							$q = $this->db->query($sql);
							$subregion = $q->result_array();
							$t = count($subregion);
							if ($t) {
								?><optgroup label="Regions"><?php
								for ($i = 0; $i < $t; $i++) {
									if (!@in_array($subregion[$i]['subregion'], $get['loc'])) {
										?>
										<option value="<?php echo htmlentitiesX($subregion[$i]['subregion']); ?>"><?php echo htmlentitiesX($subregion[$i]['subregion']); ?></option>
										<?php
									}
								}
								?></optgroup><?php
							}
							$sql = "select * from `countries` ORDER BY country ASC";
							$q = $this->db->query($sql);
							$country = $q->result_array();
							$t = count($country);
							if ($t) {
								?><optgroup label="Countries"><?php
								for ($i = 0; $i < $t; $i++) {
									if (!@in_array($country[$i]['country'], $get['loc'])) {
										?>
										<option value="<?php echo htmlentitiesX($country[$i]['country']); ?>"><?php echo htmlentitiesX($country[$i]['country']); ?></option>
										<?php
									}
								}
								?></optgroup><?php
							}
							?>
						</select>

					</div>
				</li>
				<li class="comp-name data-col menu-dropdown classic-menu-dropdown">
					<a href="javascript:;" data-toggle="dropdown" data-close-others="true" data-hover="megamenu-dropdown" class="txt-13 hover-initialized jobcategory-list">
						Role <i class="fa fa-angle-down"></i>
					</a>
					<div class="dropdown-menu hold-on-click pull-left nmt">
						<select multiple class="form-control select2 select2-offscreen" style="width:250px;" id="job_category" name="job_category[]" tabindex="-1" placeholder="Search and Select Role">
							<?php
							$sql = "select * from `job_roles` where `status`='1' and isdeleted = 0";
							$q = $this->db->query($sql);
							$jobcategory = $q->result_array();
							$t = count($jobcategory);
							for ($i = 0; $i < $t; $i++) {
								if (!in_array($jobcategory[$i]['role_name'], array_values($get_jobcategory))) {
									?>
									<option value="<?php echo htmlentitiesX($jobcategory[$i]['role_name']); ?>"><?php echo htmlentitiesX($jobcategory[$i]['role_name']); ?></option>
									<?php
								}
							}
							?>
						</select>
					</div>

				</li>
				<li class="comp-name data-col menu-dropdown classic-menu-dropdown">
					<a href="javascript:;" data-toggle="dropdown" data-close-others="true" data-hover="megamenu-dropdown" class="txt-13 hover-initialized jobtype-list">
						Job Type <i class="fa fa-angle-down"></i>
					</a>
					<div class="dropdown-menu hold-on-click pull-left nmt">
						<select multiple class="form-control select2 select2-offscreen" style="width:250px;" id="jobtype" name="jobtype[]" tabindex="-1" placeholder="Search and Select Job Type">
							<?php
							$sql = "select * from `job_types` where `status`='1' and isdeleted = 0";
							$q = $this->db->query($sql);
							$position_type = $q->result_array();
							$t = count($position_type);
							for ($i = 0; $i < $t; $i++) {
								if (!in_array($position_type[$i]['job_type'], array_values($get_jobtype))) {
									?>
									<option value="<?php echo htmlentitiesX($position_type[$i]['job_type']); ?>"><?php echo htmlentitiesX($position_type[$i]['job_type']); ?></option>
									<?php
								}
							}
							?>
						</select>
					</div>

				</li>

				<li class="comp-name data-col menu-dropdown classic-menu-dropdown">
					<a href="javascript:;" data-toggle="dropdown" data-close-others="true" data-hover="megamenu-dropdown" class="txt-13 hover-initialized">
						Compensation <i class="fa fa-angle-down"></i>
					</a>
					<ul class="range dropdown-menu hold-on-click pull-left nmt">
						<li class="">
							<div class="form-group mlt">
								<div class="col-md-12">
									<div class="row">
										<div class="form-group">
											<label class="control-label text-low"><small>Currency</small></label>
											<select class="form-control" name="currency_list" id="currency_list">
												<option value="USD">USD US Dollar</option>
												<option value="">All Currency</option>
												<option value="AUD">AUD Australian Dollar </option>
												<option value="CNY">CNY Chinese Yuan Renminbi (RMB)</option>
												<option value="EUR">EUR Euro</option>
												<option value="HKD">HKD Hong Kong Dollar</option>
												<option value="IDR">IDR Indonesian Rupiah</option>
												<option value="INR">INR Indian Rupee</option>
												<option value="JPY">JPY Japanese Yen</option>
												<option value="KRW">KRW South Korean Won</option>
												<option value="MYR">MYR Malaysian Ringgit</option>
												<option value="PHP">PHP Philippine Peso</option>
												<option value="SGD">SGD Singapore Dollar</option>
												<option value="THB">THB Thai Baht</option>
												<option value="TWD">TWD New Taiwan Dollar</option>
												<option value="USD">USD US Dollar</option>
												<option value="VND">VND Vietnamese Dong</option>

											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<label class="control-label text-low"><small>Min</small></label>
										<input type="text" name="salary_min" id="salary_min" value="<?php echo (isset($_GET['salary_min'])) ? $_GET['salary_min'] : ""; ?>" class="form-control input-small" placeholder="">
									</div>
									<div class="col-md-6">
										<label class="control-label text-low"><small>Max</small></label>
										<input type="text" name="salary_max" id="salary_max" value="<?php echo (isset($_GET['salary_max'])) ? $_GET['salary_max'] : ""; ?>" class="form-control  input-small" placeholder="">
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 text-right">
										<a href="javascript:void(0);" class="btn green-haze salary-filter" style="text-transform:none; font-size:13px; margin-right:5px; margin-top:15px">Add filter</a>
									</div>
								</div>
							</div>
						</li>
					</ul>
				</li>
				<?php
				/*
					  <li class="comp-name data-col menu-dropdown classic-menu-dropdown">
				<a href="javascript:;" data-toggle="dropdown" data-close-others="true" data-hover="megamenu-dropdown" class="txt-13 hover-initialized job-status">
				  Status <i class="fa fa-angle-down"></i>
				</a>
				<div class="dropdown-menu hold-on-click pull-left nmt">
				  <select class="form-control select2 select2-offscreen" style="width:250px;" id="job_filter_fltr" name="job_filter_fltr" tabindex="-1" placeholder="Select status">
								  <option selected>All</option>
								  <option value="1" <?php echo (isset($_GET['job_status']) && $_GET['job_status'] == 1) ? "selected" : ""; ?>>Active</option>
								  <option value="0" <?php echo (isset($_GET['job_status']) && $_GET['job_status'] == 0) ? "selected" : ""; ?>>Inactive</option>
				  </select>
				</div>

			  </li>
			  */
				?>
			</ul>
		</div>
	</div>
</div>
<script type="text/javascript">


    jQuery(document).ready(function() {

        jQuery('#loc').select2({
            placeholder: "Select Country / Region",
            allowClear: true,
            closeOnSelect: false
        }).on("select2-selecting", function(e) {
            var insVar = '<li class="label">' + e.val + '<input type="hidden" name="loc[]" value="' + e.val + '" /><a class="tag-cls"><i class="fa fa-times"></i></a></li>';
            jQuery("#job-search").append(insVar);
            ajax_job_search();
        }).on("select2-close", function() {
            jQuery(".dropdown-menu").closest('li').removeClass('open');
        }).on("change", function(e) {
            jQuery('#loc').select2("val", "");
            jQuery("#select2-drop-mask").click();
        });

        jQuery(".location-list").on("click", function() {

            var select2 = jQuery("#loc").data('select2');
            setTimeout(function() {
                if (!select2.opened()) {
                    select2.open();
                }
            }, 0);
        });


        jQuery('#job_category').select2({
            placeholder: "Select Job Category",
            allowClear: true,
            closeOnSelect: false
        }).on("select2-selecting", function(e) {
            var insVar = '<li class="label">' + e.val + '<input type="hidden" name="job_category[]" value="' + e.val + '" /><a class="tag-cls"><i class="fa fa-times"></i></a></li>';
            jQuery("#job-search").append(insVar);
            ajax_job_search();
        }).on("select2-close", function() {
            jQuery(".dropdown-menu").closest('li').removeClass('open');
        }).on("change", function(e) {
            jQuery('#job_category').select2("val", "");
            jQuery("#select2-drop-mask").click();
        });

        jQuery(".jobcategory-list").on("click", function() {

            var select2 = jQuery("#job_category").data('select2');
            setTimeout(function() {
                if (!select2.opened()) {
                    select2.open();
                }
            }, 0);
        });



        jQuery('#jobtype').select2({
            placeholder: "Select Job Type",
//		allowClear: true,
//		closeOnSelect: false
        }).on("select2-selecting", function(e) {
            var insVar = '<li class="label">' + e.val + '<input type="hidden" name="job_type[]" value="' + e.val + '" /><a class="tag-cls"><i class="fa fa-times"></i></a></li>';
            jQuery("#job-search").append(insVar);
            ajax_job_search();
        }).on("select2-close", function() {
            jQuery(".dropdown-menu").closest('li').removeClass('open');
        }).on("change", function(e) {
            jQuery('#jobtype').select2("val", "");
            jQuery("#select2-drop-mask").click();
        }).on("close", function(e) {
            jQuery("#select2-drop-mask").click();
        });

        jQuery(".jobtype-list").on("click", function() {

            var select2 = jQuery("#jobtype").data('select2');
            setTimeout(function() {
                if (!select2.opened()) {
                    select2.open();
                }
            }, 0);
        });


        jQuery('#job_filter_fltr').select2({
            placeholder: "Select startup status",
            allowClear: true,
            closeOnSelect: false
        }).on("select2-selecting", function(e) {
            jQuery(".job_filter_lbl").remove();
            console.log(e.choice);
            if(e.val !== "All"){
                var insVar = '<li class="label job_filter_lbl">Job Status: ' + e.choice.text + '<input type="hidden" name="job_status" value="' + e.val + '" /><a class="tag-cls"><i class="fa fa-times"></i></a></li>';
                jQuery("#job-search").append(insVar);
            }
            ajax_job_search();
        }).on("select2-close", function() {
            jQuery(".dropdown-menu").closest('li').removeClass('open');
        }).on("change", function(e) {
            jQuery('#job_filter_fltr').select2("val", "");
            jQuery("#select2-drop-mask").click();
        });


        jQuery(".job-status").on("click", function() {

            var select2 = jQuery("#job_filter_fltr").data('select2');
            setTimeout(function() {
                if (!select2.opened()) {
                    select2.open();
                }
            }, 0);
        });


        +function($) {
            "use strict";

            // PILLBOX CONSTRUCTOR AND PROTOTYPE

            var Pillbox = function(element, options) {
                this.$element = $(element);
                this.options = $.extend({}, $.fn.pillbox.defaults, options);
                this.$element.on('click', 'li .tag-cls', $.proxy(this.itemclicked, this));
            };

            Pillbox.prototype = {
                constructor: Pillbox,
                items: function() {
                    return this.$element.find('li').map(function() {
                        var $this = $(this);
                        return $.extend({text: $this.text()}, $this.data());
                    }).get();
                },
                itemclicked: function(e) {
                    $(e.currentTarget).parent().remove();
                    ajax_job_search();
                    e.preventDefault();
                }
            };


            // PILLBOX PLUGIN DEFINITION

            $.fn.pillbox = function(option) {
                var methodReturn;

                var $set = this.each(function() {
                    var $this = $(this);
                    var data = $this.data('pillbox');
                    var options = typeof option === 'object' && option;

                    if (!data)
                        $this.data('pillbox', (data = new Pillbox(this, options)));
                    if (typeof option === 'string')
                        methodReturn = data[option]();
                });

                return (methodReturn === undefined) ? $set : methodReturn;
            };

            $.fn.pillbox.defaults = {};

            $.fn.pillbox.Constructor = Pillbox;


            // PILLBOX DATA-API

            $(function() {
                $('body').on('mousedown.pillbox.data-api', '.pillbox', function(e) {
                    var $this = $(this);
                    if ($this.data('pillbox'))
                        return;
                    $this.pillbox($this.data());
                });
            });

            var addPill=function($input){
                var $text=$input.val(),$pills=$input.closest('.pillbox'),$repeat=false,$repeatPill;
                if($text=="")
                    return;
                $("li",$pills).text(function(i,v){
                    if(v==$text){
                        $repeatPill=$(this);
                        $repeat=true;
                    }
                });
                if($repeat){
                    $repeatPill.fadeOut().fadeIn();
                    return;
                };
                var $item;
                $text = $text.trim();
                var $text_array = $text.split(" ");
                for (var i = 0; i < $text_array.length; i++) {
                    $item=$('<li class="label bg-dark">'+$text_array[i]+'<input type="hidden" name="keyword[]" value="'+$text_array[i]+'" /><a class="tag-cls"><i class="fa fa-times"></i></a></li> ');
                    $item.insertBefore($input);
                }
                //var $item=$('<li class="label bg-dark">'+$text+'<input type="hidden" name="keyword[]" value="'+$text+'" /><a class="tag-cls"><i class="fa fa-times"></i></a></li> ');
                //$item.insertBefore($input);
                $input.val('');
                $pills.trigger('change',$item);
            };

            $('.pillbox .pillbox-text').on('blur',function(e){
                if($(this).val().trim() !== ""){
                    addPill($(this));
                    ajax_job_search();
                    e.preventDefault();
                }
            });

            $('.pillbox .pillbox-text').on('keypress',function(e){
                if(e.which==13 && $(this).val().trim() !== ""){
                    e.preventDefault();
                    addPill($(this));
                    ajax_job_search();
                }
            });

        }(window.jQuery);

        jQuery(".salary-filter").on("click", function() {

            var err_msg = "";
            var insVar = "";

            if (jQuery("#salary_min").val().trim() == "" && jQuery("#salary_max").val().trim() == "") {
                err_msg = err_msg + "Kindly enter Compensation range";
            }

            if (((jQuery("#salary_min").val() != "" && jQuery("#salary_max").val() != "") && parseInt(jQuery("#salary_min").val()) > parseInt(jQuery("#salary_max").val())) || (jQuery("#salary_min").val().trim() == "0" && jQuery("#salary_max").val().trim() == "0")) {
                err_msg = err_msg + "Invalid Compensation range\n";
            } else if (jQuery("#salary_min").val() != "" || jQuery("#salary_max").val() != "") {
                var salary_min = amountIze(jQuery("#salary_min").val());
                var salary_max = amountIze(jQuery("#salary_max").val());
                var currencyType = jQuery("#currency_list").val();
                var min_text = "";

                if (parseInt(jQuery("#salary_max").val()) > 0) {
                    salary_max = " - " + salary_max + '<input type="hidden" name="compensation_max" value="' + jQuery("#salary_max").val() + '" />';
                } else {
                    salary_max = "";
                    min_text = "Min";
                }

                insVar = '<li class="label salary_range">Compensation ' + currencyType + '<input type="hidden" name="currency_type" value="' + currencyType + '" /> ' + min_text + ' ' + salary_min + salary_max + ' <input type="hidden" name="compensation_min" value="' + jQuery("#salary_min").val() + '" /><a class="tag-cls"><i class="fa fa-times"></i></a></li>';
                jQuery("#job-search .salary_range").remove();
                jQuery("#job-search").append(insVar);
            }

            if (err_msg !== "") {
                alert(err_msg);
                return false;
            }

            jQuery('body').trigger('click');
            ajax_job_search();

            return false;

        });



        function amountIze(amount) {

            if (!is_numeric(amount)) {
                return 0;
            }
            if (amount >= 1000000) {
                if (amount % 1000000) {
                    amount = amount / 1000000;
                    amount = amount.toFixed(2).replace(/0+$/, '');
                    amount = amount + "M";
                }
                else {
                    amount = amount / 1000000;
                    amount = amount.toFixed(0) + "M";
                }
            }
            else if (amount >= 1000) {
                if (amount % 1000) {
                    amount = amount / 1000;
                    amount = amount.toFixed(1).replace(/0+$/, '');
                    amount = amount + "K";
                }
                else {
                    amount = amount / 1000;
                    amount = amount.toFixed(0) + "K";
                }
            }
            return amount;
        }

        function is_numeric(n) {
            return !isNaN(parseFloat(n)) && isFinite(n);
        }

        $(".pillbox").click( function() {
            $(".pillbox-text").focus();
        });


    });




</script>
<!-- <link href="<?php //echo site_url("html/theme/assets"); ?>/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.css" rel="stylesheet"/> -->

<style>
	.pillbox {
		background-color:#fff; padding:15px;border-bottom:1px solid #ececec; cursor: text
	}
	.pillbox ul {
		margin: 0;
		padding: 0;
		list-style: none;
	}
	.pillbox li {
		float: left;
		/*background: none repeat scroll 0% 0% rgb(233, 233, 233);*/
		border-radius: 3px ! important;
		border: 1px solid #a4c86e;
		display: inline-block;
		color: #fff;
		font-weight: 700;
		background-color: #a4c86e;
		font-size: 14px;
		padding:5px;
		margin:0px 8px 5px 0px
	}

	.pillbox li:first-child {
		margin-left:27px
	}
	.pillbox li .tag-cls{
		/* float: left;*/
		margin-right: 5px;
		font-size: 14px;
		line-height: 13px;
		cursor: pointer;
		font-style: normal;
		color:#565656;
	}
	.pillbox li .tag-cls i.fa-times {
		font-size: 11px;
		color: #fff;
	}
	.pillbox li .tag-cls:hover{
		color: #000000;
		text-decoration: none;
	}

	.pillbox li:hover:after {
		opacity: 0.9;
		filter: alpha(opacity=90);
	}
	.pillbox input {
		border: none;
		outline: 0;
		padding: 2px;
		min-height: 20px;
		width: auto;
		display: inline-block;
		box-shadow: none;
		background: transparent;
	}

	input[type=number]::-webkit-outer-spin-button,
	input[type=number]::-webkit-inner-spin-button {
		-webkit-appearance: none;
		margin: 0;
	}

	input[type=number] {
		-moz-appearance:textfield;
	}
</style>
