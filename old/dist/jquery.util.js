(function($, _){

	$.utTreeToList = function(tree){
		var toList = [];
		
		var _treeToList = function(formTree){
			if(formTree.children){
				var node = _.clone(formTree);
				delete node.children;
				toList.push(node);
				var name = node.name;
				_.each(formTree.children, function(ele, i, li){
					_treeToList(ele, toList);
				});
			}else{
				toList.push(formTree);
			}
		};
		_treeToList(tree);
	};

	$.utAjaxTreeToList = function(url, pid, fn){
		var toList = [],
			requestCount = 0;
		
		var _ajaxTreeToList = function(formTree){
			if(formTree.children){
				var node = _.clone(formTree);
				delete node.children;
				toList.push(node);
				var name = node.name;
				_.each(formTree.children, function(ele, i, li){
					ele.name = name + ' - ' + ele.name;
					_ajaxTreeToList(ele, toList);
				});
			}else{
				if(formTree.isParent){
					requestCount++;
					$.getJSON(
						url + '?pid=' + formTree.id,
						function(json){
							requestCount--;
							json[0] && (json[0].name = formTree.name + ' - ' + json[0].name) && _ajaxTreeToList(json[0], toList, fn);
							requestCount || fn(toList);
						}
					);
				}else{
					 requestCount || fn(toList);
				}
				toList.push(formTree);
			}
		};
		$.getJSON(
			url + '?pid=' + pid,
			function(json){
				_ajaxTreeToList(json[0]);
			}
		);
	};

})(jQuery, _);
