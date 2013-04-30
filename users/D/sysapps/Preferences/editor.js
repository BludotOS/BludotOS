configuration = {
    tabwidth: 4,
    
};
areas = document.querySelectorAll(".numbered_textarea");
function htmlEntities(str) {
    return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
}
function pad(str, length, character){ while(str.length < length){str = character+str;} return str; }

var highlight = function(str){
    for(regex in highlight.syntax){
        str = str.replace(new RegExp(regex, "g"),"<span class=\""+ highlight.syntax[regex] + "\">$1</span>");
        //str = str.replace(new RegExp(regex, "g"),"$1".replace(");
    }
    return str;
};
highlight.syntax = {
    "\\b(var )": "blue",
    "\\b(function\\b)":"blue",
    "\\b(if|for|while|do|switch|case|new|try|catch|throw|document|window|undefined)\\b": "yellow",
    "\\b(String|Array|Object|Function|Math)\\b":"orange",
    "\\b(this)\\b":"cyan",
    "(&quot;(?:\\\\?.)*?&quot;)":"cyan",
    "('(?:\\\\?.)*?')":"cyan",
    "(//.*)":"base01",
    "\\b(console\.error)\\b": "red",
    "\\b(console\.(warn|assert))\\b": "yellow",
    "\\b(console\.(log|info))\\b": "green",
    "\\b(console\.)\\b": "base1",
    "\\b([0-9]+|0x[0-9a-fA-F]+)\\b": "violet",
};
[].slice.call(areas).forEach(function(area){
    textarea = document.createElement("textarea");
    table = document.createElement("table");
    var content = area.innerHTML;
    area.innerHTML = "";
    area.appendChild(table);
    area.appendChild(textarea);
    textarea.addEventListener("keyup", textarea.process = function(e){
        table.innerHTML = "";
        lines = this.value.split('\n');
        lines.forEach(function(lineText, index){
            line = document.createElement("tr");
            number=document.createElement("td");
            number.className = "lineNumber";
            text  = document.createElement("td");
            text.className = "line";
            number.innerHTML = pad(index.toString(), 4, "0");
            //TODO: html entities
            text.innerHTML = highlight(htmlEntities(lineText))+" ";
            line.appendChild(number);
            line.appendChild(text);
            table.appendChild(line);
        });
        
    }, false);
    textarea.value = content;
    textarea.process.call(textarea);
    textarea.addEventListener("scroll", function(e){
            table.style.top = (-textarea.scrollTop)+"px";
    }, false);
    var setCurrentLine = function (e){
        
        currentLine =(textarea.value.substr(0,textarea.selectionStart).split('\n').length||1)-1;
        [].slice.call(table.querySelectorAll("tr.currentLine")).forEach(function(e){
            e.className = "lineNumber";
        });
        if(tr = table.querySelectorAll("tr")[currentLine])
            tr.className += " currentLine";
    };
    textarea.addEventListener("keyup", setCurrentLine);
    textarea.addEventListener("mouseup", setCurrentLine);
    textarea.addEventListener("keydown", function(e){
        if(e.keyCode === 9){
            e.preventDefault();
            tab = pad("", configuration.tabwidth, " ");
            var selS = this.value.substr(0, this.selectionStart),
                selE = this.value.substr(this.selectionEnd,this.value.length);
            this.value = selS + tab + selE;
            this.setSelectionRange(selS.length+tab.length, selS.length+tab.length);
            //this.selectionStart = selS.length+4;
        }
    }, false);
});