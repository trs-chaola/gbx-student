(function() {
	   tinymce.create('tinymce.plugins.shortcodes', {

	      init : function(ed, url) {

	      	 ed.addButton('row', {
	            title : 'Row',
	            image : url+'/images/row.png',
	            onclick : function() {
	               ed.execCommand('mceInsertContent', false, '[row customclass=""][/row]');
	            }
	         });

	         ed.addButton('columns', {
	            title : 'Columns',
	            image : url+'/images/col.png',
	            onclick : function() {
	               ed.execCommand('mceInsertContent', false, '[columns span="6" customclass=""][/columns]');
	            }
	         });

	         ed.addButton('section', {
	            title : 'Section',
	            image : url+'/images/section.png',
	            onclick : function() {
	               ed.execCommand('mceInsertContent', false, '[section customclass=""][/section]');
	            }
	         });

	         ed.addButton('large_text', {
	            title : 'Large Text',
	            image : url+'/images/large_txt.png',
	            onclick : function() {
	               ed.execCommand('mceInsertContent', false, '[large_text customclass=""][/large_text]');
	            }
	         });

	         ed.addButton('page_heading', {
	            title : 'Page Heading',
	            image : url+'/images/section_heading.png',
	            onclick : function() {
	               ed.execCommand('mceInsertContent', false, '[page_heading customclass=""][/page_heading]');
	            }
	         });

	         ed.addButton('subheading', {
	            title : 'Sub-Heading',
	            image : url+'/images/sub_heading.png',
	            onclick : function() {
	               ed.execCommand('mceInsertContent', false, '[subheading customclass="light"][/subheading]');
	            }
			
	         });


	         ed.addButton('promo_text', {
	            title : 'Promo Text',
	            image : url+'/images/animated_promo.png',
	            onclick : function() {
	               ed.execCommand('mceInsertContent', false, '[promo_text customclass=""]Normal Text[bold_text]Bold Text[/bold_text][/promo_text]');
	            }
			
	         });

	         
	         ed.addButton('team', {
	            title : 'Team',
	            image : url+'/images/team.png',
	            onclick : function() {
	               ed.execCommand('mceInsertContent', false, '[team customclass=""]');
	            }
			
	         });

	         ed.addButton('contact_form', {
	            title : 'Contact Form',
	            image : url+'/images/contact_form.png',
	            onclick : function() {
	               ed.execCommand('mceInsertContent', false, '[contact_form customclass=""]');
	            }
			
	         });

	         ed.addButton('services', {
	            title : 'Services',
	            image : url+'/images/services.png',
	            onclick : function() {
	               ed.execCommand('mceInsertContent', false, '[services customclass=""][service_item color_code="" background_img_url="" icon_url="" title="" link=""]Service Text[/service_item][/services]');
	            }
			
	         });
			 
			 ed.addButton('button', {
	            title : 'Button',
	            image : url+'/images/button.png',
	            onclick : function() {
	               ed.execCommand('mceInsertContent', false, '[button url="" customclass=""][/button]');
	            }
			
	         });

	         ed.addButton('sticky_button', {
	            title : 'Sticky Button',
	            image : url+'/images/sticky_button.png',
	            onclick : function() {
	               ed.execCommand('mceInsertContent', false, '[sticky_button url=""][/sticky_button]');
	            }
			
	         });
			 
			 

	         ed.addButton('swiper_wrap', {
	            title : 'Swiper',
	            image : url+'/images/swiper.png',
	            onclick : function() {
	               ed.execCommand('mceInsertContent', false, '[swiper_wrap customclass=""][swiper_slide color_code="" main_title="" image_url="" sub_title=""]The Content[/swiper_slide][/swiper_wrap]');
	            }
	         });

	         

	         

	         
			
			
			

	      },
	      createControl : function(n, cm) {

	      	 return null;
	      },
	      getInfo : function() {
	         return {
	            longname : "Shortcodes",
        };
	      }
	   });
   tinymce.PluginManager.add('shortcodes', tinymce.plugins.shortcodes);
})();