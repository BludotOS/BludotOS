	/*****************************************************

Date script



******************************************************/
var DateTime = function() {
    if (arguments.length == 0) {
        this.date = new Date();
    }
    else {
        try {
            if (arguments.length == 1 && (typeof arguments[0]  == "string" || typeof arguments[0]  == "number")) {
                this.date = new Date(arguments[0]);
            }
            else if (arguments.length > 1) {
                switch(arguments.length) {
                    case 2:
                        this.date = new Date(arguments[0], arguments[1]);
                        break;
                    case 3:
                        this.date = new Date(arguments[0], arguments[1], arguments[2]);
                        break;
                    case 4:
                        this.date = new Date(arguments[0], arguments[1], arguments[2], arguments[3]);
                        break;
                    case 5:
                        this.date = new Date(arguments[0], arguments[1], arguments[2], arguments[3], arguments[4]);
                        break;
                    case 6:
                        this.date = new Date(arguments[0], arguments[1], arguments[2], arguments[3], arguments[4], arguments[5]);
                        break;
                    case 7:
                        this.date = new Date(arguments[0], arguments[1], arguments[2], arguments[3], arguments[4], arguments[5], arguments[6]);
                        break;
                    default:
                        this.date = new Date();
                        break;
                };
            }
            else {
                this.date = new Date();
            };
        }
        catch (ex) { 
            console.log("ERROR: Createing DateTime Object: \r\n", ex);
            this.date = new Date();
        };
    };
    if (this.date == "Invalid Date") this.date = new Date();
    
    this.getDaySuffix = function(a) {
        var b = "" + a,
            c = b.length,
            d = parseInt(b.substring(c-2, c-1)),
            e = parseInt(b.substring(c-1));
        if (c == 2 && d == 1) return "th";
        switch(e) {
            case 1:
                return "st";
                break;
            case 2:
                return "nd";
                break;
            case 3:
                return "rd";
                break;
            default:
                return "th";
                break;
        };
    };
    
    this.getDoY = function(a) {
        var b = new Date(a.getFullYear(),0,1);
        return Math.ceil((a - b) / 86400000);
    }
    
    this.weekdays = new Array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
    this.months = new Array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
    this.daySuf = new Array( "st", "nd", "rd", "th" );
   
    this.day = {
        index: {
            week: "0" + this.date.getDay(),
            month: (this.date.getDate() < 10) ? "0" + this.date.getDate() : this.date.getDate()
        },
        name: this.weekdays[this.date.getDay()],
        of: {
            week: ((this.date.getDay() < 10) ? "0" + this.date.getDay() : this.date.getDay()) + this.getDaySuffix(this.date.getDay()),
            month: ((this.date.getDate() < 10) ? "0" + this.date.getDate() : this.date.getDate()) + this.getDaySuffix(this.date.getDate())
        }
    }
   
    this.month = {
        index: (this.date.getMonth() + 1) < 10 ? "0" + (this.date.getMonth() + 1) : this.date.getMonth() + 1,
        name: this.months[this.date.getMonth()]
    };
   
    this.year = this.date.getFullYear();
   
    this.time = {
        hour: {
            meridiem: (this.date.getHours() > 12) ? (this.date.getHours() - 12) < 10 ? "0" + (this.date.getHours() - 12) : this.date.getHours() - 12 : (this.date.getHours() < 10) ? "0" + this.date.getHours() : this.date.getHours(),
            military: (this.date.getHours() < 10) ? "0" + this.date.getHours() : this.date.getHours(),
            noLeadZero: {
                meridiem: (this.date.getHours() > 12) ? this.date.getHours() - 12 : this.date.getHours(),
                military: this.date.getHours()
            }
        },
        minute: (this.date.getMinutes() < 10) ? "0" + this.date.getMinutes() : this.date.getMinutes(),
        seconds: (this.date.getSeconds() < 10) ? "0" + this.date.getSeconds() : this.date.getSeconds(),
        milliseconds: (this.date.getMilliseconds() < 100) ? (this.date.getMilliseconds() < 10) ? "00" + this.date.getMilliseconds() : "0" + this.date.getMilliseconds() : this.date.getMilliseconds(),
        meridiem: (this.date.getHours() > 12) ? "PM" : "AM"
    };
    
    this.sym = {
        d: {
            d: this.date.getDate(),
            dd: (this.date.getDate() < 10) ? "0" + this.date.getDate() : this.date.getDate(),
            ddd: this.weekdays[this.date.getDay()] ? this.weekdays[this.date.getDay()].substring(0, 3) : null,
            dddd: this.weekdays[this.date.getDay()],
            ddddd: ((this.date.getDate() < 10) ? "0" + this.date.getDate() : this.date.getDate()) + this.getDaySuffix(this.date.getDate()),
            m: this.date.getMonth() + 1,
            mm: (this.date.getMonth() + 1) < 10 ? "0" + (this.date.getMonth() + 1) : this.date.getMonth() + 1,
            mmm: this.months[this.date.getMonth()] ? this.months[this.date.getMonth()].substring(0, 3) : null,
            mmmm: this.months[this.date.getMonth()],
            yy: (""+this.date.getFullYear()).substr(2, 2),
            yyyy: this.date.getFullYear()
        },
        t: {
            h: (this.date.getHours() > 12) ? this.date.getHours() - 12 : this.date.getHours(),
            hh: (this.date.getHours() > 12) ? (this.date.getHours() - 12) < 10 ? "0" + (this.date.getHours() - 12) : this.date.getHours() - 12 : (this.date.getHours() < 10) ? "0" + this.date.getHours() : this.date.getHours(),
            hhh: this.date.getHours(),
            m: this.date.getMinutes(),
            mm: (this.date.getMinutes() < 10) ? "0" + this.date.getMinutes() : this.date.getMinutes(),
            s: this.date.getSeconds(),
            ss: (this.date.getSeconds() < 10) ? "0" + this.date.getSeconds() : this.date.getSeconds(),
            ms: this.date.getMilliseconds(),
            mss: Math.round(this.date.getMilliseconds()/10) < 10 ? "0" + Math.round(this.date.getMilliseconds()/10) : Math.round(this.date.getMilliseconds()/10),
            msss: (this.date.getMilliseconds() < 100) ? (this.date.getMilliseconds() < 10) ? "00" + this.date.getMilliseconds() : "0" + this.date.getMilliseconds() : this.date.getMilliseconds()
        }
    };
   
    this.formats = {
        compound: {
            commonLogFormat: this.sym.d.dd + "/" + this.sym.d.mmm + "/" + this.sym.d.yyyy + ":" + this.sym.t.hhh + ":" + this.sym.t.mm + ":" + this.sym.t.ss,
            exif: this.sym.d.yyyy + ":" + this.sym.d.mm + ":" + this.sym.d.dd + " " + this.sym.t.hhh + ":" + this.sym.t.mm + ":" + this.sym.t.ss,
            /*iso1: "",
            iso2: "",*/
            mySQL: this.sym.d.yyyy + "-" + this.sym.d.mm + "-" + this.sym.d.dd + " " + this.sym.t.hhh + ":" + this.sym.t.mm + ":" + this.sym.t.ss,
            postgreSQL1: this.sym.d.yyyy + "." + this.getDoY(this.date),
            postgreSQL2: this.sym.d.yyyy + "" + this.getDoY(this.date),
            soap: this.sym.d.yyyy + "-" + this.sym.d.mm + "-" + this.sym.d.dd + "T" + this.sym.t.hhh + ":" + this.sym.t.mm + ":" + this.sym.t.ss + "." + this.sym.t.mss,
            //unix: "",
            xmlrpc: this.sym.d.yyyy + "" + this.sym.d.mm + "" + this.sym.d.dd + "T" + this.sym.t.hhh + ":" + this.sym.t.mm + ":" + this.sym.t.ss,
            xmlrpcCompact: this.sym.d.yyyy + "" + this.sym.d.mm + "" + this.sym.d.dd + "T" + this.sym.t.hhh + "" + this.sym.t.mm + "" + this.sym.t.ss,
            wddx: this.sym.d.yyyy + "-" + this.sym.d.m + "-" + this.sym.d.d + "T" + this.sym.t.h + ":" + this.sym.t.m + ":" + this.sym.t.s
    },
        constants: {
            atom: this.sym.d.yyyy + "-" + this.sym.d.mm + "-" + this.sym.d.dd + "T" + this.sym.t.hhh + ":" + this.sym.t.mm + ":" + this.sym.t.ss,
            cookie: this.sym.d.dddd + ", " + this.sym.d.dd + "-" + this.sym.d.mmm + "-" + this.sym.d.yy + " " + this.sym.t.hhh + ":" + this.sym.t.mm + ":" + this.sym.t.ss,
            iso8601: this.sym.d.yyyy + "-" + this.sym.d.mm + "-" + this.sym.d.dd + "T" + this.sym.t.hhh + ":" + this.sym.t.mm + ":" + this.sym.t.ss,
            rfc822: this.sym.d.ddd + ", " + this.sym.d.dd + " " + this.sym.d.mmm + " " + this.sym.d.yy + " " + this.sym.t.hhh + ":" + this.sym.t.mm + ":" + this.sym.t.ss,
            rfc850: this.sym.d.dddd + ", " + this.sym.d.dd + "-" + this.sym.d.mmm + "-" + this.sym.d.yy + " " + this.sym.t.hhh + ":" + this.sym.t.mm + ":" + this.sym.t.ss,
            rfc1036: this.sym.d.ddd + ", " + this.sym.d.dd + " " + this.sym.d.mmm + " " + this.sym.d.yy + " " + this.sym.t.hhh + ":" + this.sym.t.mm + ":" + this.sym.t.ss,
            rfc1123: this.sym.d.ddd + ", " + this.sym.d.dd + " " + this.sym.d.mmm + " " + this.sym.d.yyyy + " " + this.sym.t.hhh + ":" + this.sym.t.mm + ":" + this.sym.t.ss,
            rfc2822: this.sym.d.ddd + ", " + this.sym.d.dd + " " + this.sym.d.mmm + " " + this.sym.d.yyyy + " " + this.sym.t.hhh + ":" + this.sym.t.mm + ":" + this.sym.t.ss,
            rfc3339: this.sym.d.yyyy + "-" + this.sym.d.mm + "-" + this.sym.d.dd + "T" + this.sym.t.hhh + ":" + this.sym.t.mm + ":" + this.sym.t.ss,
            rss: this.sym.d.ddd + ", " + this.sym.d.dd + " " + this.sym.d.mmm + " " + this.sym.d.yy + " " + this.sym.t.hhh + ":" + this.sym.t.mm + ":" + this.sym.t.ss,
            w3c: this.sym.d.yyyy + "-" + this.sym.d.mm + "-" + this.sym.d.dd + "T" + this.sym.t.hhh + ":" + this.sym.t.mm + ":" + this.sym.t.ss
    },
        pretty: {
            a: this.sym.t.h + ":" + this.sym.t.mm + "." + this.sym.t.ss + this.time.meridiem + " " + this.sym.d.dddd + " " + this.sym.d.ddddd + " of " + this.sym.d.mmmm + ", " + this.sym.d.yyyy,
            b: this.sym.t.h + ":" + this.sym.t.mm + this.time.meridiem +  " " + this.sym.d.dddd + " " + this.sym.d.ddddd + " of " + this.sym.d.mmmm + ", " + this.sym.d.yyyy
        }
    };
   
};
/******************************************************






******************************************************/

/*var getTime = function()
{
  var dt = new DateTime();
var newToday = dt.day.name + " " + dt.day.of.month + " " + dt.month.name + ", " + dt.time.hour.noLeadZero.meridiem + ":" + dt.time.minute + " " + dt.time.meridiem;
 return newToday;
};*/

    	var load = function(users, widgets) {
  this.desktop = document.querySelector('.login-desktop');
  this.taskbar = this.desktop.querySelector('.login-taskbar');
  this.taskbar.node = this.taskbar.children[0];
  this.loginNames = this.desktop.querySelector('.login-names');
  this.logincontainer = this.desktop.querySelector('.login-container');
  this.loginTop = -115;
  console.log(this.taskbar.node);
  for(var i=0; i < this.taskbar.node.children.length; i++) {
    console.log(this.taskbar.node.children[i].querySelector('div'));
    this.taskbar.node.children[i].addEventListener('click', function() {
      //this.querySelector('div').children[0].style.display = this.querySelector('div').children[0].style.display == 'none' ? 'block' : 'none';
      this.className = this.className == 'power on' ? 'power off' : 'power on';
    }, false);
  };
  var logins = {
    loginbox: function(visible, name, pic) {
      var temp = document.createElement('div');
      var classtype = visible == true ? 'current' : 'not-current';
      temp.className = classtype+" login-box";
      temp.username = document.createElement('div');
      temp.username.className = classtype+' username';
      temp.username.appendChild(document.createTextNode(name));
      loginNames.appendChild(temp.username);
      temp.username.pic = document.createElement('div');
      temp.username.pic.className = 'pic';
      temp.username.pic.style.background = 'url('+pic+') no-repeat center';
      temp.username.pic.style.backgroundSize = 'cover';
      if(classtype == 'current') {
      temp.appendChild(temp.username.pic);
      //temp.appendChild(temp.username);
      temp.input = document.createElement('input');
      temp.input.className = 'input';
      temp.input.type = 'password';
      //temp.inpout.appendChild(document.createTextNode(name));
      temp.appendChild(temp.input);
      temp.lbutton = document.createElement('input');
      temp.lbutton.className = 'lbutton';
      temp.lbutton.type = 'button';
      temp.lbutton.value = 'Login';
      //temp.inpout.appendChild(document.createTextNode(name));
      temp.appendChild(temp.lbutton);
      }
      return temp;
    },
    load: function(users) {
      for(var i in users) {
        var temp;
        if(i == 0) {
          temp = new this.loginbox(true, users[i].name, users[i].pic);
          logincontainer.children[0].querySelector('.username-input').value = users[i].name;
        } else {
          temp = new this.loginbox(false, users[i].name, users[i].pic);
        }
        temp.username.addEventListener('click', function() {
            console.log(this.innerHTML);
            /*var parent = this.parentNode.parentNode;
            var temp = this.parentNode.previousSibling.cloneNode(true);
            this.parentNode.parentNode.removeChild(this.parentNode.previousSibling);
            this.parentNode.parentNode.insertBefore(this.parentNode.cloneNode(true), this.parentNode);
            this.parentNode.previousSibling.className = 'login-box current';
            this.parentNode.parentNode.removeChild(this.parentNode);
            temp.className = 'login-box not-current';
            parent.appendChild(temp);*/
            
            
            /*var temp = this.parentNode.previousSibling.username.childNodes[0].cloneNode(true);
            this.parentNode.previousSibling.username.removeChild(this.parentNode.previousSibling.username.childNodes[0]);
            this.parentNode.previousSibling.username.appendChild(this.childNodes[0].cloneNode(true));
            this.removeChild(this.childNodes[0]);
            this.appendChild(temp);
            temp = this.parentNode.parentNode.children[0].pic.style.background;
            this.parentNode.parentNode.children[0].pic.style.background = this.parentNode.pic.style.background;
            this.parentNode.pic.style.background = temp;*/
          console.log(this.offsetTop);
          console.log(this.previousSibling.offsetTop);
          var temp1 = this.offsetTop;
          console.log(1);
          //console.log(logincontainer.children[0].username.pic);
          console.log('offsetTop: '+this.offsetTop);
          console.log('marginTop: '+this.parentNode.style.marginTop);
          function dis(node) {
          if(node.previousElementSibling && node.previousElementSibling.className.indexOf('not-current') == -1) {
          //var temp2 = this.previousSibling.offsetTop;
            console.log('p');
            loginTop = loginTop - 150;
            node.parentNode.style.marginTop = loginTop + 'px';
            node.className = 'login-username current';
            node.previousElementSibling.className = 'username not-current';
            logincontainer.children[0].querySelector('.pic').style.background = node.pic.style.background;
            
          } else if(node.nextElementSibling && node.nextElementSibling.className.indexOf('not-current') == -1) {
            console.log(2);
            //var temp2 = this.nextSibling.offsetTop;
            loginTop = loginTop + 150;
            node.parentNode.style.marginTop = loginTop + 'px';
            node.className = 'login-username current';
            node.nextElementSibling.className = 'username not-current';
            console.log('test');
            console.log('n');
            logincontainer.children[0].querySelector('.pic').style.background = node.pic.style.background;
          } else {
            console.log('error');
          }
          }
          //dis(this);
          if(this.offsetTop > loginNames.querySelector('.login-username.current').offsetTop) {
          this.parentNode.style.marginTop = -100-(this.offsetTop-98)+'px';
          } else if(this.offsetTop < loginNames.querySelector('.login-username.current').offsetTop) {
          this.parentNode.style.marginTop = -100-(this.offsetTop+5)+'px';  
          }
          this.parentNode.querySelector('.username.current').className = 'login-username not-current';
          this.className = 'login-username current';
          logincontainer.children[0].querySelector('.pic').style.background = this.pic.style.background;
          logincontainer.children[0].querySelector('.login-username-input').value = this.innerHTML;
          /*if(temp1 > temp2 && this.className.indexOf('not-current') != -1) {
            loginTop = loginTop - 175;
            this.parentNode.style.marginTop = loginTop + 'px';
            this.className = 'username current';
            this.previousSibling.className = 'username not-current';
            console.log('test');
          } else if(temp1 < temp2 && this.className.indexOf('not-current') != -1) {
            loginTop = loginTop + 175;
            this.parentNode.style.marginTop = loginTop + 'px';
            this.className = 'username current';
            this.nextSibling.className = 'username not-current';
            console.log('test');
          }*/
            
          }, false);
        if(temp.className.indexOf('not-current') == -1) {
          //logincontainer.appendChild(temp);
        }
      }
    }
  };
  var widget = {
    widgetbox: function(visible, name) {
      var temp = document.createElement('div');
      var classtype = visible == true ? 'current' : 'not-current';
      temp.className = classtype+" widget "+name;
      return temp;
    },
    load: function(widgets) {
      for(var i in widgets) {
        var temp;
        console.log(widgets[i]);
        temp = new this.widgetbox(true, widgets[i][0]);
          widgets[i][1].load(temp);
        desktop.appendChild(temp);
      }
    }
  };
  logins.load(users);
  widget.load(widgets);
}

load(
  [
    /*{
      name: 'James',
      pic: 'http://bludotos.com/images/bludot_logo.jpg'
    }*/
  ],
  [
    [
      'time',
      {
        "load": function(node) {
          var temp = document.createElement('div');
          temp.date = document.createElement('div');
          temp.date.appendChild(document.createTextNode(this.getDate()));
          temp.date.style.cssText = 'position:relative;top:0px;width:100%;text-align:center;height:55px;line-height:55px;margin:10px;';
          temp.appendChild(temp.date);
          temp.date = document.createElement('div');
          temp.date.appendChild(document.createTextNode(this.getTime()));
          temp.date.style.cssText = 'position:relative;top:0px;width:100%;text-align:center;font-size:85px;height:95px;line-height:95px;margin:10px;top:30px;';
          temp.appendChild(temp.date);
          node.appendChild(temp);
          node.style.cssText += this.style;
        },
        "style": "font-family:Open Sans;color:white;font-size:45px;text-shadow:0px 0px 5px #000;max-width:50%;top:-175px;width:auto;",
        "getTime":function() {
          var dt = new DateTime();
          var newToday = dt.time.hour.noLeadZero.meridiem + 
              ":" + 
              dt.time.minute + 
              " " + 
              dt.time.meridiem;
           return newToday;
        },
        "getDate": function() {
          var dt = new DateTime();
          var newToday = dt.day.name + 
              ", " + 
              dt.month.name +
              " " +
              dt.day.of.month;
          return newToday;
        }
      }
    ]
  ]
);