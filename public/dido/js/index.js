/*
 * Licensed to the Apache Software Foundation (ASF) under one
 * or more contributor license agreements.  See the NOTICE file
 * distributed with this work for additional information
 * regarding copyright ownership.  The ASF licenses this file
 * to you under the Apache License, Version 2.0 (the
 * "License"); you may not use this file except in compliance
 * with the License.  You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing,
 * software distributed under the License is distributed on an
 * "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
 * KIND, either express or implied.  See the License for the
 * specific language governing permissions and limitations
 * under the License.
 */

var timedb = null;
var tagdb = null;
var tododb = null;

var COLORS = ["#FF8C00","#9ACD32","#8B0000","#FF69B4","#FF6347","#BA55D3","#48D1CC","#4682B4","#FFA500","#B22222"];

var HOST = "http://www.luckyna.com";

var isPad = false;

$(document).ready(function() {
	ready();
	
	$(window).resize(function() {
		ready();
	});
});

function ready() {
	if (parseInt($(window).width())>720) {
		isPad = true;
	}
	if (isPad) {
		$("html").css("font-size",Math.floor($(window).width()/80) + "px");	
	} else {
		$("html").css("font-size", Math.floor($(window).height()/40) + "px");
	}
	
	initData();
	initEvent();
	$(".main").show();
	
	pageTiming();
	renderTimeLineScroll();
	tick();
	
	if (isPad) {
		$("#calendar").removeClass("wrapper hidden");
		iPadTodo();
		initCal();
	}
}

function initData() {
	timedb = new TAFFY();
	timedb.store("time");

	if (!timedb().first()) {
		//为demo测试
		var hitInfos = [
		            	          "时间管理的目的是让你在最短时间内实现更多你想要实现的目标。",
		            	          "把手头4到10个目标写出来，找出一个核心目标，并依次排列重要性，然后依照你的目标设定详细的计划，并依照计划进行。",
		            	          "把自己所要做的每一件事情都写下来，列一张总清单，这样做能让你随时都明确自己手头上的任务。",
		            	          '在列好清单的基础上进行目标切割。',
		            	          "你花了多少时间在哪些事情，把它详细地，记录下来",
		            	          '当你找到浪费时间的根源，你才有办法改变。',
		            	          "绝大多数难题都是由未经认真思考虑的行动引起的。",
		            	          '在制订有效的计划中每花费1小时，在实施计划中就可能节省3-4小时，并会得到更好的结果。',
		            	          '如果你没有认真作计划，那么实际上你正计划着失败。',
		            	          "用你80%的时间来做20%最重要的事情。",
		            	          '生活中肯定会有一些突发困扰和迫不及待要解决的问题，如果你发现自己天天都在处理这些事情，那表示你的时间管理并不理想。',
		            	          '一定要了解，对你来说，哪些事情是最重要的，是最有生产力的。',
		            	          "假如你每天能有一个小时完全不受任何人干扰地思考一些事情,这一个小时可以抵过你一天的工作效率，甚至可能比三天的工作效率还要好。",
		            	          "假如价值观不明确，就很难知道什么对你是最重要的，",
		            	          '当你的价值观不明确时，就无法做到合理地分配时间。',
		            	          '时间管理的重点不在管理时间，而在于如何分配时间。',
		            	          '你永远没有时间做每件事，但永远有时间做对你来说最重要的事。',
		            	          "巴金森(C.Noarthcote Parkinson)在其所著的《巴金森法则》中写下这段话“你有多少时间完成工作，工作就会自动变成需要那么多时间。”",
		            	          '如果你有一整天的时间可以做某项工作，你就会花一天的时间去做它。而如果你只有一小时的时间可以做这项工作，你就会更迅速有效地在一小时内做完它。',
		            	          "列出你目前生活中所有觉得可以授权的事情，把它们写下来，找适当的人来授权。",
		            	          "假如你在做纸上作业，那段时间都做纸上作业；假如你是在思考，用一段时间只作思考；打电话的话，最好把电话累积到某一时间一次把它打完。"
		            	];
		
		var types = [
		       "工作","沟通","休息","学习","锻炼","交通","网购" 
		];
		
		for(var i=0; i<hitInfos.length; i++) {
			var to = {
				"start": new Date().getTime() - (i+2)* ONE_DAY_MILL/4,
				"desc": hitInfos[i],
				"type": types[Math.floor(Math.random()*5)],
				"date": formateDate(new Date().getTime() - (i+2)* ONE_DAY_MILL/4),
				"stop": new Date().getTime() - (i+2)* ONE_DAY_MILL/4 + ONE_DAY_MILL/8*Math.random() 
			};
			timedb.insert(to);
		}
		
		var to = {
				"start": new Date().getTime() - ONE_DAY_MILL/4,
				"desc": '欢迎使用叮咚时间',
				"type": types[Math.floor(Math.random()*5)],
				"date": formateDate(new Date().getTime()),
				"stop": new Date().getTime() - ONE_DAY_MILL/4 + ONE_DAY_MILL/8
			};
		timedb.insert(to);
		var to = {
				"start": new Date().getTime() - ONE_DAY_MILL/4 + ONE_DAY_MILL/8,
				"desc": '叮咚时间是一款小清新风格的个人时间效率提升软件',
				"type": types[Math.floor(Math.random()*5)],
				"date": formateDate(new Date().getTime()),
				"stop": new Date().getTime()
			};
		timedb.insert(to);
		
	}
	
	tagdb = new TAFFY();
	tagdb.store("tag");
	
	tododb = new TAFFY();
	tododb.store("todo");
	
	//localStorage.removeItem("dido-user");
	//localStorage.removeItem("dido-user");
	var COLORS = ["#FF8C00","#9ACD32","#8B0000","#FF69B4","#FF6347","#BA55D3","#48D1CC","#4682B4"];
	if (!tagdb().first()) {
		tagdb.insert({"bg": "#4682B4","font":"#fff","title":"网购"});
		tagdb.insert({"bg": "#48D1CC","font":"#fff","title":"锻炼"});
		tagdb.insert({"bg": "#BA55D3","font":"#fff","title":"交通"});
		tagdb.insert({"bg": "#FF69B4","font":"#fff","title":"沟通"});
		tagdb.insert({"bg": "#8B0000","font":"#fff","title":"休息"});
		tagdb.insert({"bg": "#9ACD32","font":"#fff","title":"学习"});
		tagdb.insert({"bg": "#FF8C00","font":"#fff","title":"工作"});
	}
}

var myScroll = null;
function initEvent() {
	myScroll = new IScroll('#timeline');
	myScroll.on('beforeScrollStart', function() {
		clearPop();
	});
	
	$("#add").attach(function() {
		if ($(".add-menu:hidden").length==0) {
			$(".add-menu").hide();
		} else {
			clearPop();
			$(".add-menu").show();
		}
	});
	
	$("#add-timer").attach(function() {
		$(".add-menu").hide();
		confirmCurrent(pageTimerEdit);
	});

	$("#add-todo").attach(function() {
		$(".add-menu").hide();
		pageTodoEdit(null);
	});
	
	$(".running .info").attach(function() {
		pageTodo();
	});
	
	$(".bottom .time").attach(function() {
		pageTiming();
	});
	$(".bottom .chart, .header .ccal.icon").attach(function() {
		pageChart();
	});
	
	$(".bottom .cal").attach(function() {
		pageCal();
	});
	
	$(".bottom .me").attach(function() {
		pageMe();
	});
}

function pageTiming(d) {
	$(".main .wrapper, .main .pop-wrapper").hide();
	
	$(".main .time").show();
	$(".main .running").show();
	
	$(".main .bottom .time").html("时间记录");
	$(".bottom .item.time").removeClass("blink");
	$(".bottom .item").removeClass("sibon");
	$(".main .bottom .time").addClass("sibon");

	var c = getCurrentRunning();
	
	if (c) { 
		if (c.date != formateDate(new Date().getTime())) {
			setRunning(null);
			c = null;
		}
	}
	renderTick(c);
	
	//todoHint();
	
	if (d==null) {
		renderTimeLineScroll();
	} 
	
	$(".main .current-day").show();
	renderTimeLine(d);
}

function renderTimeLineScroll() {
	var h = $(".timeline .line").height();
	var d = new Date();
	d.setHours(2, 1, 1, 1);
	var startSec = new Date().getTime() - d.getTime();
	if (startSec<0) startSec = 0;
	var top = h * startSec/ONE_DAY_MILL;
	if (top+$("#timeline").height()>h) {
		top = h - $("#timeline").height();
	}
	myScroll.scrollTo(0, -top, 1500);
}

function start(item) {
	var last = item;
	if (last==null) {
		last = timedb({"date": formateDate(new Date().getTime())}).order("start asec").last();
	}
	
	if (last) {
		startTimer(last.type, last.desc, last.method, last.ing);
	} else {
		pageTimerEdit();
	}
}

function stop(item) {
	var c = getCurrentRunning();
	if (c) {
		timedb({"start": c.start}).update({stop: new Date().getTime()});
		setRunning(null);
		cancelNotify();
		renderTimeLine();
		renderTick(null);
	} 
}


function startTimer(type, desc, method, ing) {
	var to = {
			"start": new Date().getTime(),
			"desc": desc,
			"type": type,
			"date": formateDate(new Date().getTime()),
			"method": method,
			"ing": ing
	};
	setRunning(to);
	
	timedb.insert(to);
	renderTimeLine();
	renderTick();
}

function renderTick() {
	var w = $(".running").width();
	var ow = parseInt($(".running .op").outerWidth());
	$(".running .tick").css("width", (w-ow)/2);
	$(".running .op").css("left", (w-ow)/2);
	
	var item = getCurrentRunning();
	
	if (item) {
		$(".running .info .desc").html(item.desc);
		$(".running .op div").removeClass("start").addClass("pause");
		$(".running .op").attach(function() {
			stop();
		});
	} else {
		$(".running .tick").html("无计时");
		$(".running .op div").removeClass("pause").addClass("start");
		$(".running .op").attach(function() {
			start();
		});
	}
}

function renderTimeLine(d) {
	if (d==null) {
		d = new Date();
	}
	$(".main .header .icon").show();
	$(".main .header .icon.ttline").hide();

	if (isToday(d.getTime())) {
		$(".timeline .elapse").show();
	} else {
		$(".timeline .elapse").hide();
	}
	
	$(".main .current-day .date").html(formateDate(d.getTime()));
	
	$(".timeline .note, .timeline .section").remove();
	var w = $("#timeline").width();
	$(".timeline .line").css("left", w/2-2);
	
	var side = true;
	
	var total = 0;
	
	timedb({"date": formateDate(d.getTime())}).order("start asec").each(function(record,recordnumber) {
		addItemToTimeLine(record, side);
		if (record.stop) {
			total += record.stop - record.start;
		}
		side = !side;
	});
	
	$(".main .current-day .total").html(formatDura(total));
}

function tick() {
	var now = new Date().getTime();
	if (running) {
		var dura = formatDura(now - running.start);
		$(".running .tick").html(dura);
		if (!$(".bottom .item.time").hasClass("sibon")) {
			$(".bottom .item.time").addClass("blink");
			$(".bottom .item.time").html(dura);
		}
	}
	
	var h = $(".timeline .line").height();
	
	var d = new Date();
	d.setHours(0, 0, 0, 1);
	
	$(".timeline .elapse").css("height", h * (now-d.getTime())/ONE_DAY_MILL);
	
	setTimeout("tick()", 1000);
}

function explainObject(t) {
	var s = "";
	for(var a in t) {
		s += a  + ": " + t[a ] + ",";
 	}
	return s;
}

var ONE_DAY_MILL = 24*60*60*1000;

function addItemToTimeLine(item, side) {
	var end = item.stop;
	
	if (end==null) end = new Date().getTime();
	
	if (item.start) {
		var section = $('<div class="section"></div>');
		
		var h = $(".timeline .line").height();
		var d = new Date(item.start);
		d.setHours(0, 1, 1, 1);
		
		var startSec = item.start - d.getTime();
		
		section.css("top", h * startSec/ONE_DAY_MILL);
		section.css("height", h * (end-item.start)/ONE_DAY_MILL);
		$(".timeline .line").append(section);
		
		section.css("background-color", getTypeColor(item.type));
		
		//处理描述字段
		var desc = $('<div class="note"></div>');
		desc.data("item", item);
		var descText = "<i>" + formatHour(item.start) + " - " + (item.stop?formatHour(item.stop):"") + "</i><br>" 
			+ "<span>"+ ((item.desc==null||item.desc=="") ? item.type : item.desc) + "<span>";
		desc.html(descText);

		var color = getTypeColor(item.type);
		//desc.find("span").css("color", color);
		//desc.css("border-color", color);
		
		var noteTop =  h * startSec/ONE_DAY_MILL;
		desc.css("top", noteTop);

		var w = $("#timeline").width();
		if (side) {
			desc.css("right", w/2+10);
		} else {
			desc.css("left", w/2+10);
		}
		$(desc).css("width", w/2-30);
		
		desc.attach(function(t) {
			var zindex = 10;
			$(".timeline .note").each(function() {
				if (parseInt($(this).css("z-index"))>=zindex) {
					zindex =  parseInt($(this).css("z-index")) + 1;
				}
			});
			$(t).css("z-index", zindex);
		});
		
		desc.hold(function(t) {
			notePop(t);
		}, 1000);
		
		desc.click(function(){
			notePop($(this));
		});
		
		function notePop(t) {
			$(".pop-menu").show();
			$(".pop-menu").attach(function() {
				$(".pop-menu").hide();	
			});
			var item  = $(t).data("item");
			
			$(".pop-menu .remove").attach(function() {
				var r = getCurrentRunning();
				if (r && r.start==item.start) {
					removeRunning();
				}
				timedb({"start": item.start}).remove();
				renderTick();
				renderTimeLine();
			});
			
			var r = getCurrentRunning();
			
			if (r && r.start == item.start) {
				$(".pop-menu .start").addClass("disabled");
				$(".pop-menu .stop").removeClass("disabled").attach(function() {
					stop();
				});
			} else {
				$(".pop-menu .start").removeClass("disabled").attach(function() {
					confirmCurrent(function() {
						start(item);
						renderTimeLine();
					});
				});
				$(".pop-menu .stop").addClass("disabled");
			}
		}
		
		/*
		if (last.length>0) {
			var lastBottom = parseInt(last.css("top")) + parseInt(last.height());
			if (noteTop < lastBottom) {
				desc.css("left", (parseInt(last.css("left")) + 20) + "px");
			}
		}
		*/
		$(".timeline").append(desc);
	}
}

function confirmCurrent(cb) {
	var c = getCurrentRunning();
	if (c) {
		if (isMobile) {
			navigator.notification.confirm (
					'您当前计时正在运行，是否随之终止?', // message
					function(buttonIndex) {
						if (buttonIndex==1) {
							stop();
							cb();
						}
					},
					'正在运行',           
					['好的','先不终止']   
			);
		} else {
			if (confirm("您当前计时正在运行，是否随之终止?")) {
				stop();
				cb();
			}
		}
	} else {
		cb();
	}
}

function pageTimerEdit() {
	$(".add-time").show();
	pageTimerTypeInit();

	if (getCurrentUser()) {
		$(".add-time .sharing").show();
	} else {
		$(".add-time .sharing").hide();
	}
	
	
	$(".add-time a.yes").attach(function() { //保存
		startTimer( $(".add-time .type-opt .ttype.checked").html(), $(".add-time .desc").val(),
				$(".add-time .notify").hasClass("checked")?parseInt($(".add-time .notify input").val()):-1,
				$(".add-time .sharing").hasClass("checked")?1 : 0);
		$(".add-time").hide();
	});
	
	$(".add-time a.return").attach(function() { //save time item
		$(".add-time").hide();
	});
}

var running = null;
function getCurrentRunning() {
	var r = localStorage.getItem("dido-running");
	if (r) {
		running = JSON.parse(r);
	}
	return running;
}

function setRunning(r) {
	localStorage.setItem("dido-running", JSON.stringify(r));
	running = r;
}

function removeRunning() {
	localStorage.removeItem("dido-running");
	running = null;
}

function iPadTodo() {
	$('#calendar .padtodo li.tit').remove();
	
	tododb({finished: 0}).each(function(record, num){
		addTodoItem(record);
	});
	
	tododb({finished : 1, date: formateDate(new Date().getTime())}).each(function(record, num){
		addTodoItem(record);
	});
	
	function addTodoItem(record) {
		var cloned = $("#calendar .padtodo ul li.template").clone();
		cloned.removeClass("template").addClass("tit");
		
		cloned.find(".title .type").html(record.type).css("background-color", getTypeColor(record.type));
		cloned.find(".title .content").html(record.desc);
		
		cloned.data("todo", record);
		
		if (record.finished) {
			cloned.addClass("finished");
			cloned.find(".start").hide();
		}
		
		cloned.find(".remove").attach(function() {
			var todo = $(this).parents("li.tit").data("todo");
			tododb({___id: todo.___id}).remove();
			$(this).parents("li.tit").slideUp();
		});
		
		cloned.find(".checkbox").attach(function() {
			var li = $(this).parents("li.tit");
			var todo = li.data("todo");
			if (todo.finished) {
				li.removeClass("finished");
				li.find(".start").show();
				todo.finished = 0;
				tododb(todo).update({finished: 0, upd: new Date().getTime(),date: formateDate(new Date().getTime())});
			} else {
				li.find(".start").hide();
				li.addClass("finished");
				todo.finished = 1;
				tododb(todo).update({finished: 1, upd: new Date().getTime(),date: formateDate(new Date().getTime())});
			}
			//todoHint();
		});
		
		cloned.find(".start").attach(function() {
			var todo = $(this).parents("li.tit").data("todo");
			confirmCurrent(function() {
				startTimer(todo.type,  todo.desc, -1, 0);	
			});
		});
		$("#calendar .padtodo ul").append(cloned);
	}
}

function pageTodo() {
	if ($(".main .todo:hidden").length==0) {
		$(".main .todo").hide();
		$(".running .info").addClass("off");
		return;
	} else {
		$(".main .todo").show();
		$(".running .info").addClass("on");
	}
	
	$(".main .todo ul li.item").remove();
	
	tododb({finished: 0}).each(function(record, num){
		addTodoItem(record);
	});
	
	tododb({finished : 1, date: formateDate(new Date().getTime())}).each(function(record, num){
		addTodoItem(record);
	});
	
	function addTodoItem(record) {
		$(".main .todo .msg").hide();
		var cloned = $(".main .todo ul li.hidden").clone();
		cloned.removeClass("hidden").addClass("item");
		
		cloned.find(".content").html(record.type + ":" + record.desc);
		cloned.find(".content").css("color", getTypeColor(record.type));
		
		cloned.data("todo", record);
		
		if (record.finished) {
			cloned.addClass("finished");
			cloned.find(".start").hide();
		}
		
		cloned.find(".remove").attach(function(t) {
			var todo = $(t).parents("li.item").data("todo");
			tododb({___id: todo.___id}).remove();
			$(t).parents("li.item").slideUp();
			todoHint();
		});
		
		cloned.find(".checkbox").attach(function(t) {
			var li = $(t).parents("li.item");
			var todo = li.data("todo");
			if (todo.finished) {
				li.removeClass("finished");
				li.find(".start").show();
				todo.finished = 0;
				tododb(todo).update({finished: 0, upd: new Date().getTime(),date: formateDate(new Date().getTime())});
			} else {
				li.find(".start").hide();
				li.addClass("finished");
				todo.finished = 1;
				tododb(todo).update({finished: 1, upd: new Date().getTime(),date: formateDate(new Date().getTime())});
			}
			todoHint();
		});
		
		cloned.find(".start").attach(function(t) {
			var todo = $(t).parents("li.item").data("todo");
			confirmCurrent(function() {
				startTimer(todo.type,  todo.desc, -1, 0);
				$(".main .todo").hide();
			});
		});
		$(".main .todo ul").append(cloned);
	}
}

function todoHint() {
	var c = tododb({finished:0}).count();
	if (c>0) {
		$(".running .info .hint").show();
		$(".running .info .hint").html(c);
	} else {
		$(".running .info .hint").hide();
	}
}


function clearPop() {
	$(".header .add-menu").hide();
	$(".main .todo").hide();
}


function pageTodoEdit() {
	$(".edit-todo").show();
	$(".edit-todo a.return").attach(function() { //save time item
		$(".edit-todo").hide();
	});
	
	$(".edit-todo a.yes").attach(function() { //保存
		var todo = {};
		todo.created = new Date().getTime();
		//todo.date = $(".edit-todo .date").html();
		todo.desc = $(".edit-todo .desc").val();
		todo.type = $(".edit-todo .type-opt .ttype.checked").html();
		todo.finished = 0;
		tododb.insert(todo);
		$(".edit-todo").hide();
		iPadTodo();
		//todoHint();
	});
	
	pageTimerTypeInit();
	/*
	var now = new Date();
	$(".edit-todo .date").html(formateDate(now));
	$(".date").attach(function(t) {
		var di = $(t);
		var dd = parseDate(di.html());
		var options = {
			  date: dd,
			  mode: 'date'
		};
		datePicker.show(options, function(date){
			if (date.getTime()) {
				di.html(formateDate(date.getTime()));
			}
		});
	});
	*/
}

function pageTimerTypeInit() {
	$(".type-opt div.ttype").remove();
	tagdb().each(function(record, number) {
		var ttype = $('<div class="ttype fl"></div>');
		ttype.html(record.title);
		ttype.data("tag", record);
		ttype.attach(function() {
			checkType($(this));
		});
		$(".type-opt").prepend(ttype);
	});
	
	checkType($(".edit-todo .type-opt div.ttype").first());
	checkType($(".add-time .type-opt div.ttype").first());
	
	function checkType(t) {
		$(t).siblings(".checked").css("color", "#999").css("background-color", "#F7F7F7").removeClass("checked");
		$(t).addClass("checked");
		var tag = $(t).data("tag");
		$(t).css("color", tag.font);
		$(t).css("background-color", tag.bg);
	}
	
	$(".type-opt .config").attach(function() {
		pageTagConfig();
	});
}

function pageTagConfig(current) {
	$(".tag-config").show();
	
	$(".tag-config ul.list li.ttype").remove();
	
	tagdb().each(function(record, number) {
		var ttype = $('<li class="ttype"></li>');
		ttype.html(record.title);
		ttype.data("tag", record);
		ttype.attach(function() {
			configSelected($(this));
		});
		
		$(".tag-config ul.list").prepend(ttype);
	});
	
	$(".tag-config ul.list li.add").attach(function() {
		configSelected(null);
	});
	
	$(".tag-config .yes").attach(function() {
		cfmTypeSave();
	});
	$(".tag-config .config .alert").attach(function() {
		cfmTypeRemove();
	})
	
	$(".tag-config .cancel").attach(function() {
		$(".tag-config").hide();
		pageTimerTypeInit();
	});
	
	$(".tag-config ul.colors li").remove();
	for ( var i = 0; i < COLORS.length; i++) {
		var li = $("<li></li>");
		li.css("background-color", COLORS[i]);
		li.data("color", COLORS[i]);
		
		li.bind("touchstart", function() {
			$(".tag-config ul.colors li.checked").removeClass("checked");
			$(this).addClass("checked");
		});
		
		$(".tag-config ul.colors").append(li);
	}
	
	function configSelected(t) {
		$(".tag-config .ttype.checked").css("color", "#999").css("background-color", "#F7F7F7").removeClass("checked");
		if (t!=null) {
			$(".tag-config").data("current", t.data("tag"));
		} else {
			$(".tag-config").data("current", null);
		}
		
		if (t) {
			$(t).addClass("checked");
			var tag = $(t).data("tag");
			$(t).css("color", tag.font);
			$(t).css("background-color", tag.bg);
			$(".tag-config .name").val(tag.title);
			$(".tag-config ul.colors li").each(function() {
				if ($(this).data("color") == tag.bg) {
					$(this).addClass("checked");
				} else {
					$(this).removeClass("checked");
				}
			});
			$(".tag-config .total").html(timedb({type:tag.title}).count());
			$(".tag-config .config .alert").show();
		} else {
			$(".tag-config .config .alert").hide();
			$(".tag-config .name").val("");
			if (!$(".tag-config ul.colors li.checked")) {
				$(".tag-config ul.colors li").first().addClass("checked");
			}
			$(".tag-config .total").html(0);
		}
	}
	if (current==null) {
		configSelected($(".tag-config ul.list li.ttype").first());
	} else {
		$(".tag-config ul.list li.ttype").each(function() {
			if ($(this).html()==current) {
				configSelected($(this));
			}
		}) ;
	}
}

function getTypeColor(type) {
	if (type==null) {
		return "#444";
	}
	var tag = tagdb({"title": type}).first();
	if (tag) {
		return tag.bg;
	} else {
		return "#444"; 
	}
}

//保存标签的事件
function cfmTypeSave() {
	var t = $(".tag-config").data("current");
	var name = $(".tag-config .name").val();
	var color = $(".tag-config ul.colors li.checked").data("color");
	
	if (name=="") {
		 $(".tag-config .config .msg").html("名称不能为空");
		 return;
	}
	
	if (t==null) { //新建标签。  首先判断是否和现有冲突
		if (tagdb({"title": name}).count()==1) {
			$(".tag-config .config .msg").html("同名标签已经存在了");
			return;
		}
		tagdb.insert({"bg": color,"font":"#fff","title":name});
	} else {
		if (name==t.title) { //不改名
			tagdb({"title": name}).update({"bg": color});
		} else {
			if (tagdb({"title": name}).count()==1) {
				$(".tag-config .config .msg").html("同名标签已经存在了");
				return;
			}
			tagdb({"title": t.title}).update({"bg": color,"title": name});
			
			//更新所有设置为此分类的时间项
			timedb({"type": t.title}).update({"type": name});
		}
	}
	pageTagConfig(name);
}

function cfmTypeRemove() {
	var t = $(".tag-config").data("current");
	if (t==null) return;
	tagdb({"title": t.title}).remove();
	pageTagConfig();
}

function pageChart() {
	clearPop();
	$(".main .wrapper, .main .running, .main .pop-wrapper,.main .header .icon").hide();
	$(".main .chart").show();
	
	$(".date-donut").addClass("sibon");
	drawDateDonut();
	
	$(".date-donut").attach(function(t) {
		drawDateDonut();
	});
	
	$(".week-donut").attach(function(t) {
		drawDateDonut(new Date(), 7);
	});
	
	$(".date-bar").attach(function(t) {
		drawDateBar();
	});
	
	$(".week-bar").attach(function(t) {
		
	});
	
	//drawDateDonut(new  Date().getTime());
	
    //Donut3D.transition("salesDonut", randomData(), 130, 100, 30, 0.4);
}

function drawDateBar(until) {
	var w = $("#graph").width();
	var h = $(".main .chart").height();

	var gh = h - $(".main .chart .title").height() - 2 * $(".main .chart .type").height();

	var space = 30;
	//$("#graph").css("top", (h-gh)/2);
	
	d3.select("#graph").select("svg").remove();
	var svg = d3.select("#graph").append("svg").attr("width",w).attr("height",gh);
	
	if (until==null) until = new Date();
	until = getLastDateOfWeek(until);
	until.setHours(23,59,59);
	
	$(".chart .title .prev").attach(function() {
		drawDateBar(new Date(until.getTime()-7*ONE_DAY_MILL));
	});
	
	$(".chart .title .next").attach(function() {
		drawDateBar(new Date(until.getTime()+7*ONE_DAY_MILL));
	});
	
	var chartTitle = formateDate(until.getTime()-7*ONE_DAY_MILL) + "-" + formateDate(until.getTime());
	$(".chart .title .content").html(chartTitle);
	    
	var xdata = [];
	for (var i = 0; i < 7; i++) {
		xdata.push(formateDateShort(until-i*ONE_DAY_MILL));
	}
	xdata.reverse();
	
	var barLast = {};
	
	var barData = [];
	
	timedb({"start": {"<": until.getTime(),">": until.getTime() - 7*ONE_DAY_MILL}}).each(function(record) {
		var o = {
			x : formateDateShort(record.start),
			l : record.stop-record.start,
			c : getTypeColor(record.type)
		};
		if (barLast[formateDateShort(record.start)]==null) {
			o.s = o.l;
		} else {
			o.s = barLast[formateDateShort(record.start)].s + o.l;
		}
		barLast[formateDateShort(record.start)] = o;
		barData.push(o);
	});
	
    var xRange = d3.scale.ordinal().rangeRoundBands([space, w], 0.4).domain(xdata);
    
    var yRange = d3.scale.linear().range([gh-space, space]).domain([0,
         d3.max(barData, function (d) {
        		return d.s/(60*60*1000);
         })
       ]);
    
    var xAxis = d3.svg.axis().scale(xRange).tickSize(5).tickSubdivide(true);
    
    var yAxis = d3.svg.axis().scale(yRange).tickSize(5).orient("left").tickSubdivide(true);
    
    svg.append('svg:g').attr('class', 'x axis').attr('transform', 'translate(0,' + (gh - space) + ')').call(xAxis);

    svg.append('svg:g').attr('class', 'y axis').attr('transform', 'translate(' + (space) + ',0)').call(yAxis);
    
    svg.selectAll('rect').data(barData).enter().append('rect')
    .attr('x', function (d) {
      return xRange(d.x);
    })
    .attr('y', function (d) {
      return gh-space;
    })
    .attr('width', xRange.rangeBand())
    .attr('height', function (d) {
      return 0;
    })
    .attr('fill', 'grey')
    .transition().duration(1500).ease("elastic")
    .attr('height', function (d) {
      return (gh-space) - yRange(d.l/(60*60*1000)); 
    })
    .attr('y', function (d) {
      return yRange(d.s/(60*60*1000));
    }).attr('fill', function (d) {
    	return "#ff7f0e";
    });
    /*
    .on('mouseover',function(d){
      d3.select(this)
        .attr('fill','blue');
    })
    .on('mouseout',function(d){
      d3.select(this)
        .attr('fill','#ff7f0e');
    })
    */
}

function drawDateDonut(time, dateDura) {
	$(".main .chart .type a.current").removeClass("current");
	$(".main .chart .type a.date-donut").addClass("current");
	
	var w = $("#graph").width();
	var h = $(".main .chart").height();
	var gh = h - $(".main .chart .title").height() - $(".main .chart .type").height();
	
	if (w>gh) w = gh;
	
	var space = 30;
	$("#graph").css("top", (h-w)/2);
	
    var data = [];
    var total = 0;
    
    if (time==null) time = new Date();
    time.setHours(23,59,59);
    if (dateDura==null) dateDura = 1;
    
    if (dateDura==7) { //按一周统计的话，
    	time = getLastDateOfWeek(time);
    }
    
    var chartTitle = (dateDura==1)? (formateDate(time.getTime())):(formateDate(time.getTime()-dateDura*ONE_DAY_MILL) + "-" + formateDate(time.getTime()));
    
    $(".chart .title .prev").attach(function() {
    	drawDateDonut(new Date(time.getTime()-dateDura*ONE_DAY_MILL), dateDura);
	});
	
	$(".chart .title .next").attach(function() {
		drawDateDonut(new Date(time.getTime()+dateDura*ONE_DAY_MILL), dateDura);
	});
	
    $(".chart .title .content").html(chartTitle);
    
    timedb({"start": {"<": time.getTime(),">": time.getTime() - dateDura*ONE_DAY_MILL}}).each(function(record,recordnumber) {
		var o = {};
		if (record.stop==null) {
			if (formateDate(new Date())==record.date) {
				o.value = new Date().getTime() - record.start;
			} else {
				return;
			}
		} else {
			o.value = record.stop - record.start;
		}
		o.label = record.type;
		o.color = getTypeColor(o.label);
		
		total += o.value;
		for ( var i = 0; i < data.length; i++) {
			if (data[i].label==o.label) {
				data[i].value += o.value;
				return;
			}
		}
		data.push(o);
	});
    
    if (total == 0 ) {
    	data.push({value:ONE_DAY_MILL, color: "#ccc", label: "无"});
    }
    
	d3.select("#graph").select("svg").remove();
	var svg = d3.select("#graph").append("svg").attr("width",w).attr("height",w);
    svg.append("g").attr("id","salesDonut");
    
    data.push({value:ONE_DAY_MILL, color: "#fff", label: ""});
    Donut3D.draw("salesDonut", data, w/2, w/2, w/2-space, w/2-space, 20, 0.4);
    data.pop();
    data.push({value:0, color: "#fff", label: ""});
    Donut3D.transition("salesDonut", data, w/2-space, w/2-space, 20, 0.4);
}

function pageMe() {
	clearPop();
	$(".main .wrapper, .main .running, .main .pop-wrapper,.main .header .icon").hide();
	$(".main .wrapper.me").show();
	
	var str = "您有" + timedb().count() + "条计时项，"  + tododb().count() + "条待办记录";
	$(".me.wrapper .about-me .desc").html(str);
	
	if (!getCurrentUser()) { //未登陆，直接邀请注册
		$(".me.wrapper .about-me .title").html("未登陆");
		$(".me.wrapper .about-me").attach(function() {
			pageRegister();
		});
		
		$(".me.wrapper li.backup .desc").html("无备份信息");
		$(".me.wrapper .logout").hide();
	} else {
		$(".me.wrapper .about-me").unbind();
		$(".me.wrapper .about-me .title").html(getCurrentUser());
		
		$(".me.wrapper li.backup .desc").html("服务器无法连接");
		
		$.getJSON(HOST + "/service/dido/current", {}, function(data) {
			if (data.backup) {
				$(".me.wrapper li.backup .desc").html("最近备份于" + formateDate(parseInt(data.backup)));
			} else {
				$(".me.wrapper li.backup .desc").html("无备份信息");
			}
		}).fail(function(err) {
			if(err.status==401) {
				removeCurrentUser();
				pageMe();
			}
			return;
		});
		$(".me.wrapper .logout").show();
		$(".me.wrapper .logout").attach(function() {
			logout();
		});
	}
	
	$(".me.wrapper li.backup").attach(function() {
		backUp();
	});
	$(".me.wrapper li.restore").attach(function() {
		recover();
	});
	
	$(".me.wrapper li.me-tag-config").attach(function() {
		pageTagConfig();
	});
}



function getCurrentUser() {
	return localStorage.getItem("dido-user");
}

function setCurrentUser(u) {
	return localStorage.setItem("dido-user", u);
}

function removeCurrentUser() {
	localStorage.removeItem("dido-user");
}

function pageRegister() {
	$(".reg-user").show();
	
	$(".reg-user a.return").attach(function() {
		$(".reg-user").hide();
	});
	
	$(".reg-user .dlogin").attach(function() {
		$(".reg-user").hide();
		pageLogin();
	})
	
	$(".reg-user a.btn-reg").attach(function(t) {
	
		if ($(t).html()=="正在注册") return;
		
		var u = $(".reg-user .name").val();
		var p = $(".reg-user .password").val();
		
		if (!testEmail(u) && !testMobile(u)) {
			rmsg('用户名必须为电子邮件或手机号码!');
			return;
		}
		if (p.length<6) {
			rmsg('请输入6位数密码!');
			return;
		}
		
		$(t).html("正在注册");
		$.post(HOST + "/service/dido/reg", {
			"u": u,
			"p": p,
			"device": device.model + " " + device.platform +  " " + device.version
		}, function(r) {
			//注册成功
			rmsg("注册成功");
			localStorage.setItem("dido-user",u);
			$(".reg-user").hide();
			pageMe();
			$(t).html("注册");
		}).fail(function(error) {
			if (error.status==409) {
				rmsg('这个账号已注册过');
			} else {
				rmsg('服务器现在无法连接');
			}
		});
	});
}


function pageLogin() {
	$(".login-user").show();
	
	$(".login-user a.return").attach(function() {
		$(".login-user").hide();
	});
	
	$(".login-user a.btn-login").attach(function(t) {
		if ($(t).html()=="正在登陆") return;
		
		var u = $(".login-user .name").val();
		var p = $(".login-user .password").val();
		
		if (!testEmail(u) && !testMobile(u)) {
			rmsg('用户名必须为电子邮件或手机号码!');
			return;
		}
		if (p.length<6) {
			rmsg('请输入6位数密码!');
			return;
		}
		$(t).html("正在登陆");
		
		$.getJSON(HOST + "/service/dido/login", {
			"user": u,
			"password": p,
			"device": device.model + " " + device.platform +  " " + device.version
		}, function() {
			loginSucess(u);
		}).fail(function(error) {
			if (error.status==200) {
				loginSucess(u);
			} else {
				rmsg('用户名或者密码错误');
				$(t).html("登陆");
			}
		});
	});
	
	function loginSucess(u) {
		rmsg("登陆成功");
		setCurrentUser(u);
		$(".login-user").hide();
		pageMe();
	}
}

function backUp() {
	if ($(".wrapper.me .backup .desc").html()=="正在备份") {
		return;
	}
	
	$.getJSON(HOST + "/service/dido/current", {}, function(data) {
		$(".wrapper.me .backup .desc").html("正在备份");
		$.post(HOST + "/service/dido/backup", {
			"time": timedb().stringify(),
			"todo": tododb().stringify(),
			"type": tagdb().stringify()
		}, function(time) {
			$(".wrapper.me .backup .desc").html("最近备份于" + formateDate(parseInt(time)));
		}).fail(function(err) {
		});
	}).fail(function() {
		rmsg('服务器现在无法连接');
		$(".wrapper.me .backup .desc").html("服务器现在无法连接");
	});
}

function recover() {
	if ($(".me.wrapper li.restore").html()=="恢复中") {
		return;
	}
	
	$(".me.wrapper li.restore").html("恢复中");
	
	$.getJSON(HOST + "/service/dido/list", {
		"coll": "tags"
	}, function(list) {
		tagdb().remove();
		for ( var i = 0; i < list.length; i++) {
			tagdb.insert(list[i]);
		}
		$.getJSON(HOST + "/service/dido/list", {
			"coll": "times"
		}, function(times) {
			timedb().remove();
			for ( var i = 0; i < times.length; i++) {
				timedb.insert(times[i]);
			}
			$.getJSON(HOST + "/service/dido/list", {
				"coll": "todos"
			}, function(list) {
				tododb().remove();
				for ( var i = 0; i < list.length; i++) {
					tododb.insert(list[i]);
				}
				rmsg("数据恢复完成");
				$(".me.wrapper li.restore").html("从服务器恢复");
				pageMe();
			});
		});
	});
}

function pageDiscover() {
	clearPop();
	$(".main .wrapper, .main .running, .main .pop-wrapper,.main .header .icon").hide();
	$(".main .wrapper.discover").show();
	
	$(".discover .box").attach(function() {
		var ref = window.open('http://www.luckyna.com/dido/comment.html', '_blank', 'location=yes');
	});
	
	$(".discover .ing").attach(function() {
		var ref = window.open('http://www.luckyna.com/dido/ing.html?' + new Date().getTime(), '_blank', 'location=yes');
	});
	
	$(".discover .live").attach(function() {
		var ref = window.open('http://www.luckyna.com/dido/clock.html?' + new Date().getTime(), '_blank', 'location=yes');
	});
}

function pageCal() {
	clearPop();
	$(".main .wrapper, .main .running, .main .pop-wrapper,.main .header .icon").hide();
	
	if(isPad) {
		$(".header .icon.ttline").show();
	}
	initCal();
}

function initCal() {
	$("#calendar").show();
	$('#calendar .daygrid').show();
	
	timeCal(new Date());
	
	$("#calendar .head .prev").attach(function() {
		var d = getPreMonthStart($("#calendar").data("date"));
		timeCal(d);
	});
	
	$("#calendar .head .next").attach(function() {
		var d = getNextMonthStart($("#calendar").data("date"));
		timeCal(d);
	});
}

function timeCal(date) {
	$("#calendar .head span").html(date.getFullYear() + "年" + (date.getMonth()+1) + "月");
	$("#calendar").data("date", date);
	
	drawCal(date.getFullYear(), date.getMonth(), 1, "#calendar .daygrid");
	
	var daysData = {};
	
	timedb({"start": {">": getMonthStart(date),"<": getNextMonthStart(date)}}).each(function(record) {
		if (record.stop) {
			var dura = record.stop - record.start;
			
			var date = new Date(record.start).getDate();
			if (daysData[date]==null) {
				daysData[date] = dura;
			} else {
				daysData[date] += dura;
			}
		}
	});
	
	for ( var date in daysData) {
		
		$("#date" + date).append("<div>" + formateDuraHour(daysData[date])  + "</div>");
		
		$("#date" + date).attach(function() {
			var cc = $(this).data("cc");
			var d = new Date(cc.sYear, parseInt(cc.sMonth)-1, cc.sDay);
			pageTiming(d);
		});
	}
}

function logout() {
	removeCurrentUser();
	$.getJSON(HOST + "/service/dido/logout", {},
			function() {}
	);
	
	pageMe();
}

function rmsg(str) {
	navigator.notification.alert( 
		str,  // message
	    function() { 
		},  
	    '叮咚时间助理',            // title
	    '确定'                  // buttonName
	);
}


function isToday(mill) {
	var d = new Date();
	var m = new Date(mill);
	
	return (d.getFullYear()==m.getFullYear()) && (d.getDate()==m.getDate()) && (d.getMonth()==m.getMonth());
}


function formateDate(mill) {
	var dd = new Date(mill);
	return dd.getFullYear() + "年" + (dd.getMonth()+1) + "月" + dd.getDate() + "日";
}

function formateDateShort(mill) {
	var dd = new Date(mill);
	return (dd.getMonth()+1) + "-" + dd.getDate();
}

function parseDate(str) {
	var dd = new Date();
	
	dd.setFullYear(parseInt(str.substring(0, str.indexOf("年"))));
	dd.setMonth(parseInt(str.substring(str.indexOf("年")+1, str.indexOf("月"))));
	dd.setDate(parseInt(str.substring(str.indexOf("月")+1)));
	
	return dd;
}

function formateTime(mill) {
	var dd = new Date(mill);
	return dd.getHours() + "点" + dd.getMinutes() + "分";
}

function parseTime(str) {
	var dd = new Date();
	
	dd.setHours(parseInt(str.substring(0, str.indexOf("点"))));
	dd.setMinutes(parseInt(str.substring(str.indexOf("点")+1, str.indexOf("分"))));
	
	return dd;
}

function formatDura(mill) {
	var d3 = new Date(parseInt(mill));
	return ((d3.getDate()-1)*24 + (d3.getHours()-8)) + ":" 
	+ ((d3.getMinutes()<10)?("0"+d3.getMinutes()):d3.getMinutes()) + ":"
	+ ((d3.getSeconds()<10)?("0"+d3.getSeconds()):d3.getSeconds())
}

function formateDuraHour(mill) {
	var d3 = new Date(parseInt(mill));
	return ((d3.getDate()-1)*24 + (d3.getHours()-8)) + "'" 
	+ ((d3.getMinutes()<10)?("0"+d3.getMinutes()):d3.getMinutes()) + '"';
}


function formatHour(mill) {
	var t = new Date(mill);
	return t.getHours() + ":" +  ((t.getMinutes()<10)?("0"+t.getMinutes()):t.getMinutes());
}

function getMonthStart(d) {
	d.setDate(1);
	d.setHours(0, 0, 0);
	return d;
}

function getNextMonthStart(d) {
	if (d==null) d = new Date();
	d = getMonthStart(d);
	var m = new Date(d.getTime() + 40*24*60*60*1000);
	return getMonthStart(m);
}

function getPreMonthStart(d) {
	if (d==null) d = new Date();
	d = getMonthStart(d);
	var m = new Date(d.getTime() - 10*24*60*60*1000);
	return getMonthStart(m);
}

//得到每周的最后一天(周日) 
function getLastDateOfWeek(theDate){
	var startDay = 1; //0=sunday, 1=monday etc.
	var d = theDate.getDay(); //get the current day
	var weekStart = new Date(theDate.getTime() - (d==0 ? 6:d-1)*ONE_DAY_MILL); //rewind to start day
	var weekEnd = new Date(weekStart.getTime() + 6*ONE_DAY_MILL);
	return weekEnd;
} 

function scheduleNotify(min) {
	if (isMobile) {
		window.plugin.notification.local.add({
			id: "dingdong",
			repeat: min, 
			title: "叮咚时间",
			message: "您的计时还在运行中",
			led: '00FF00',
			date: new Date(new Date().getTime() + min*60000),
			sound: 'android.resource://com.luckyna.dido/raw/dingdong'
		});
	}
}

function cancelNotify() {
	if (isMobile) {
		window.plugin.notification.local.cancelAll(function () {});
	}
}

function testEmail(str) {
	var reg = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-])+/; 
	return reg.test(str); 
}

function testMobile(str) {
	var reg = /^(13|14|15|18|17)\d{9}$/;
	return reg.test(str);
}


/**
 * 通过3d.js绘制环形图的封装， 可绘3d形状
 * **/
!function(){
	var Donut3D={};
	
	function pieTop(d, rx, ry, ir ){
		if(d.endAngle - d.startAngle == 0 ) return "M 0 0";
		var sx = rx*Math.cos(d.startAngle),
			sy = ry*Math.sin(d.startAngle),
			ex = rx*Math.cos(d.endAngle),
			ey = ry*Math.sin(d.endAngle);
			
		var ret =[];
		ret.push("M",sx,sy,"A",rx,ry,"0",(d.endAngle-d.startAngle > Math.PI? 1: 0),"1",ex,ey,"L",ir*ex,ir*ey);
		ret.push("A",ir*rx,ir*ry,"0",(d.endAngle-d.startAngle > Math.PI? 1: 0), "0",ir*sx,ir*sy,"z");
		return ret.join(" ");
	}

	function pieOuter(d, rx, ry, h ){
		var startAngle = (d.startAngle > Math.PI ? Math.PI : d.startAngle);
		var endAngle = (d.endAngle > Math.PI ? Math.PI : d.endAngle);
		
		var sx = rx*Math.cos(startAngle),
			sy = ry*Math.sin(startAngle),
			ex = rx*Math.cos(endAngle),
			ey = ry*Math.sin(endAngle);
			
			var ret =[];
			ret.push("M",sx,h+sy,"A",rx,ry,"0 0 1",ex,h+ey,"L",ex,ey,"A",rx,ry,"0 0 0",sx,sy,"z");
			return ret.join(" ");
	}

	function pieInner(d, rx, ry, h, ir ){
		var startAngle = (d.startAngle < Math.PI ? Math.PI : d.startAngle);
		var endAngle = (d.endAngle < Math.PI ? Math.PI : d.endAngle);
		
		var sx = ir*rx*Math.cos(startAngle),
			sy = ir*ry*Math.sin(startAngle),
			ex = ir*rx*Math.cos(endAngle),
			ey = ir*ry*Math.sin(endAngle);

			var ret =[];
			ret.push("M",sx, sy,"A",ir*rx,ir*ry,"0 0 1",ex,ey, "L",ex,h+ey,"A",ir*rx, ir*ry,"0 0 0",sx,h+sy,"z");
			return ret.join(" ");
	}

	function getPercent(d){
		return (d.endAngle-d.startAngle > 0.1 ? 
				(d.data.label + ":" + formateDuraHour(d.data.value) + "(" + Math.round(1000*(d.endAngle-d.startAngle)/(Math.PI*2))/10+'%)') : '');
		//Math.round(1000*(d.endAngle-d.startAngle)/(Math.PI*2))/10+'%'
	}	
	
	Donut3D.transition = function(id, data, rx, ry, h, ir){
		function arcTweenInner(a) {
		  var i = d3.interpolate(this._current, a);
		  this._current = i(0);
		  return function(t) { return pieInner(i(t), rx+0.5, ry+0.5, h, ir);  };
		}
		function arcTweenTop(a) {
		  var i = d3.interpolate(this._current, a);
		  this._current = i(0);
		  return function(t) { return pieTop(i(t), rx, ry, ir);  };
		}
		function arcTweenOuter(a) {
		  var i = d3.interpolate(this._current, a);
		  this._current = i(0);
		  return function(t) { return pieOuter(i(t), rx-.5, ry-.5, h);  };
		}
		function textTweenX(a) {
		  var i = d3.interpolate(this._current, a);
		  this._current = i(0);
		  return function(t) { return 0.6*rx*Math.cos(0.5*(i(t).startAngle+i(t).endAngle));  };
		}
		function textTweenY(a) {
		  var i = d3.interpolate(this._current, a);
		  this._current = i(0);
		  return function(t) { return 0.6*rx*Math.sin(0.5*(i(t).startAngle+i(t).endAngle));  };
		}
		
		var _data = d3.layout.pie().sort(null).value(function(d) {return d.value;})(data);
			
		d3.select("#"+id).selectAll(".topSlice").data(_data)
			.transition().duration(750).attrTween("d", arcTweenTop); 
		
		if (rx!=ry) {
			d3.select("#"+id).selectAll(".innerSlice").data(_data)
			.transition().duration(750).attrTween("d", arcTweenInner); 
			d3.select("#"+id).selectAll(".outerSlice").data(_data)
			.transition().duration(750).attrTween("d", arcTweenOuter); 	
		}
		d3.select("#"+id).selectAll(".percent").data(_data).transition().duration(750)
			.attrTween("x",textTweenX).attrTween("y",textTweenY).text(getPercent); 	
	}
	
	Donut3D.draw=function(id, data, x /*center x*/, y/*center y*/, 
			rx/*radius x*/, ry/*radius y*/, h/*height*/, ir/*inner radius*/){
	
		var _data = d3.layout.pie().sort(null).value(function(d) {return d.value;})(data);
		
		var slices = d3.select("#"+id).append("g").attr("transform", "translate(" + x + "," + y + ")")
			.attr("class", "slices");
		slices.selectAll(".topSlice").data(_data).enter().append("path").attr("class", "topSlice")
			.style("fill", function(d) { return d.data.color; })
			.style("stroke", function(d) { return d.data.color; }).transition().duration(750)
			.attr("d",function(d){ return pieTop(d, rx, ry, ir);})
			.each(function(d){this._current=d;});
		if (rx!=ry) {
			slices.selectAll(".innerSlice").data(_data).enter().append("path").attr("class", "innerSlice")
			.style("fill", function(d) { return d3.hsl(d.data.color).darker(0.7); })
			.attr("d",function(d){ return pieInner(d, rx+0.5,ry+0.5, h, ir);})
			.each(function(d){this._current=d;});
			slices.selectAll(".outerSlice").data(_data).enter().append("path").attr("class", "outerSlice")
			.style("fill", function(d) { return d3.hsl(d.data.color).darker(0.7); })
			.attr("d",function(d){ return pieOuter(d, rx-.5,ry-.5, h);})
			.each(function(d){this._current=d;});
		}
		slices.selectAll(".percent").data(_data).enter().append("text").attr("class", "percent")
			.attr("x",function(d){ return 0.6*rx*Math.cos(0.5*(d.startAngle+d.endAngle));})
			.attr("y",function(d){ return 0.6*ry*Math.sin(0.5*(d.startAngle+d.endAngle));})
			.text(getPercent).each(function(d){this._current=d;});				
	}
	this.Donut3D = Donut3D;
}();


var isMobile =/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent);
var isTouchDevice = isMobile;

$.fn.attach = function(cb) {
	attachEvent($(this), cb);
};


$.fn.hold = function(cb, t) {
	if (t==null) {
		t = 1200;
	}
	$(this).bind("touchstart", function(ev) {
		$(this).addClass("pressed");
		var tb = $(this);
		setTimeout(function() {
			if (tb!=null && tb.hasClass("pressed")) {
				$(tb).removeClass("pressed");
				cb($(tb));
			}
		}, t);
	});
	
	$(this).bind("touchend", function() {
		$(this).removeClass("pressed");
	});
	$(this).bind("touchmove", function() {
		$(this).removeClass("pressed");
	});
}

function attachEvent(src, cb) {
	$(src).unbind();
	if (isTouchDevice) {
		$(src).bind("touchstart", function() {
			$(this).addClass("pressed");
			$(this).data("touchon", true);
		});
		$(src).bind("touchend",  function() {
			$(this).removeClass("pressed");
			if($(this).data("touchon")) {
				if ($(this).siblings(".sib").length > 0) {
					if ($(this).hasClass("sibon")) {
						return;
					}
					cb.bind(this)();
					$(this).siblings(".sib.sibon").removeClass("sibon");
					$(this).addClass("sibon");
				} else {
					cb.bind(this)();
				}
			}
			$(this).data("touchon", false);
		});
		$(src).on('touchmove',function (e){
			$(this).data("touchon", false);
			$(this).removeClass("pressed");
		});
	} else {
		$(src).bind("mousedown", function() {
			$(this).addClass("pressed");
		});
		
		$(src).bind("mouseup", function() {
			$(this).removeClass("pressed");
			cb.bind(this)();
		});
	}
}
/*
         http://www.JSON.org/json2.js
         2010-11-17
         Public Domain.
         */
        var JSON;
        if (!JSON) {
            JSON = {};
        }

        (function () {
            "use strict";

            function f(n) {
                return n < 10 ? '0' + n : n;
            }

            if (typeof Date.prototype.toJSON !== 'function') {

                Date.prototype.toJSON = function (key) {

                    return isFinite(this.valueOf()) ? this.getUTCFullYear() + '-' + f(this.getUTCMonth() + 1) + '-' + f(this.getUTCDate()) + 'T' + f(this.getUTCHours()) + ':' + f(this.getUTCMinutes()) + ':' + f(this.getUTCSeconds()) + 'Z' : null;
                };

                String.prototype.toJSON = Number.prototype.toJSON = Boolean.prototype.toJSON = function (key) {
                    return this.valueOf();
                };
            }

            var cx = /[\u0000\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g,
                escapable = /[\\\"\x00-\x1f\x7f-\x9f\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g,
                gap, indent, meta = {
                    '\b': '\\b',
                    '\t': '\\t',
                    '\n': '\\n',
                    '\f': '\\f',
                    '\r': '\\r',
                    '"': '\\"',
                    '\\': '\\\\'
                },
                rep;


            function quote(string) {

                escapable.lastIndex = 0;
                return escapable.test(string) ? '"' + string.replace(escapable, function (a) {
                    var c = meta[a];
                    return typeof c === 'string' ? c : '\\u' + ('0000' + a.charCodeAt(0).toString(16)).slice(-4);
                }) + '"' : '"' + string + '"';
            }


            function str(key, holder) {



                var i, k, v, length, mind = gap,
                    partial, value = holder[key];


                if (value && typeof value === 'object' && typeof value.toJSON === 'function') {
                    value = value.toJSON(key);
                }


                if (typeof rep === 'function') {
                    value = rep.call(holder, key, value);
                }


                switch (typeof value) {
                case 'string':
                    return quote(value);

                case 'number':


                    return isFinite(value) ? String(value) : 'null';

                case 'boolean':
                case 'null':


                    return String(value);



                case 'object':


                    if (!value) {
                        return 'null';
                    }


                    gap += indent;
                    partial = [];


                    if (Object.prototype.toString.apply(value) === '[object Array]') {


                        length = value.length;
                        for (i = 0; i < length; i += 1) {
                            partial[i] = str(i, value) || 'null';
                        }


                        v = partial.length === 0 ? '[]' : gap ? '[\n' + gap + partial.join(',\n' + gap) + '\n' + mind + ']' : '[' + partial.join(',') + ']';
                        gap = mind;
                        return v;
                    }


                    if (rep && typeof rep === 'object') {
                        length = rep.length;
                        for (i = 0; i < length; i += 1) {
                            k = rep[i];
                            if (typeof k === 'string') {
                                v = str(k, value);
                                if (v) {
                                    partial.push(quote(k) + (gap ? ': ' : ':') + v);
                                }
                            }
                        }
                    } else {


                        for (k in value) {
                            if (Object.hasOwnProperty.call(value, k)) {
                                v = str(k, value);
                                if (v) {
                                    partial.push(quote(k) + (gap ? ': ' : ':') + v);
                                }
                            }
                        }
                    }


                    v = partial.length === 0 ? '{}' : gap ? '{\n' + gap + partial.join(',\n' + gap) + '\n' + mind + '}' : '{' + partial.join(',') + '}';
                    gap = mind;
                    return v;
                }
            }


            if (typeof JSON.stringify !== 'function') {
                JSON.stringify = function (value, replacer, space) {



                    var i;
                    gap = '';
                    indent = '';



                    if (typeof space === 'number') {
                        for (i = 0; i < space; i += 1) {
                            indent += ' ';
                        }



                    } else if (typeof space === 'string') {
                        indent = space;
                    }


                    rep = replacer;
                    if (replacer && typeof replacer !== 'function' && (typeof replacer !== 'object' || typeof replacer.length !== 'number')) {
                        throw new Error('JSON.stringify');
                    }



                    return str('', {
                        '': value
                    });
                };
            }


            if (typeof JSON.parse !== 'function') {
                JSON.parse = function (text, reviver) {


                    var j;

                    function walk(holder, key) {


                        var k, v, value = holder[key];
                        if (value && typeof value === 'object') {
                            for (k in value) {
                                if (Object.hasOwnProperty.call(value, k)) {
                                    v = walk(value, k);
                                    if (v !== undefined) {
                                        value[k] = v;
                                    } else {
                                        delete value[k];
                                    }
                                }
                            }
                        }
                        return reviver.call(holder, key, value);
                    }


                    text = String(text);
                    cx.lastIndex = 0;
                    if (cx.test(text)) {
                        text = text.replace(cx, function (a) {
                            return '\\u' + ('0000' + a.charCodeAt(0).toString(16)).slice(-4);
                        });
                    }


                    if (/^[\],:{}\s]*$/.test(text.replace(/\\(?:["\\\/bfnrt]|u[0-9a-fA-F]{4})/g, '@').replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g, ']').replace(/(?:^|:|,)(?:\s*\[)+/g, ''))) {


                        j = eval('(' + text + ')');


                        return typeof reviver === 'function' ? walk({
                            '': j
                        }, '') : j;
                    }

                    throw new SyntaxError('JSON.parse');
                };
            }
        }());



        // ****************************************
        // *
        // * End JSON Code Object Handler
        // *
        // ****************************************       

        
        
        

