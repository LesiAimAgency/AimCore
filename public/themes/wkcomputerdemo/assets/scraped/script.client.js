var _____WB$wombat$assign$function_____=function(name){return (globalThis._wb_wombat && globalThis._wb_wombat.local_init && globalThis._wb_wombat.local_init(name))||globalThis[name];};if(!globalThis.__WB_pmw){globalThis.__WB_pmw=function(obj){this.__WB_source=obj;return this;}}{
let window = _____WB$wombat$assign$function_____("window");
let self = _____WB$wombat$assign$function_____("self");
let document = _____WB$wombat$assign$function_____("document");
let location = _____WB$wombat$assign$function_____("location");
let top = _____WB$wombat$assign$function_____("top");
let parent = _____WB$wombat$assign$function_____("parent");
let frames = _____WB$wombat$assign$function_____("frames");
let opener = _____WB$wombat$assign$function_____("opener");
class DiscountCheckoutHandle {
	constructor() {
	}
	setCoupon(element) {
		let code = element.attr('data-code');
		$('#js_discount_input_code').val(code);
		this.apply();
	}
	apply(element) {
		let code = $('#js_discount_input_code').val();
		let data = {
			'action' : 'Discount_Checkout_Ajax::applyCode',
			'code'   : code,
		};
		$.post(ajax, data, function() {}, 'json').done(function(response) {
			if(response.status === 'success') {
				update_order_review();
			}
		});
	}
	remove(element) {
		$('#js_discount_input_code').val('');
		let data = {
			'action' : 'Discount_Checkout_Ajax::removeCode',
		};
		$.post(ajax, data, function() {}, 'json').done(function(response) {
			if(response.status === 'success') {
				update_order_review();
			}
		});
	}
}

const discountCheckout = new DiscountCheckoutHandle()
$(document)
	.on('click', '#js_discount_btn_apply', function() {
		discountCheckout.apply($(this))
	})
	.on('click', '#js_discount_btn_remove', function() {
		discountCheckout.remove($(this))
	})
	.on('click', '.js_coupon', function() {
		discountCheckout.setCoupon($(this))
	})
}

/*
     FILE ARCHIVED ON 06:06:47 Mar 09, 2025 AND RETRIEVED FROM THE
     INTERNET ARCHIVE ON 03:36:22 Jun 13, 2026.
     JAVASCRIPT APPENDED BY WAYBACK MACHINE, COPYRIGHT INTERNET ARCHIVE.

     ALL OTHER CONTENT MAY ALSO BE PROTECTED BY COPYRIGHT (17 U.S.C.
     SECTION 108(a)(3)).
*/
/*
playback timings (ms):
  captures_list: 0.533
  exclusion.robots: 0.052
  exclusion.robots.policy: 0.042
  esindex: 0.008
  cdx.remote: 16.692
  LoadShardBlock: 109.332 (3)
  PetaboxLoader3.datanode: 101.448 (4)
  PetaboxLoader3.resolve: 127.389 (2)
  load_resource: 135.593
*/