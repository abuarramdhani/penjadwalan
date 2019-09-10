/*!
 * MaskAsNumber Jquery Plugin v1.5.0
 * https://github.com/andrehtissot/jquery-mask-as-number
 *
 * Requires jQuery Library
 * https://jquery.com/
 *
 * Copyright André Augusto Tissot
 * Released under the MIT license
 *
 * Date: 2017-03-10
 */
"use strict";
(function($) {
  var dataKey = 'maskAsNumber',
    compareAsString = function(numberA, numberB){
    if(numberA.indexOf('.') !== -1 && numberB.indexOf('.') !== -1) {
      let decimalsToAddOnB = numberA.length-numberA.indexOf('.')-1,
        decimalsToAddOnA = numberB.length-numberB.indexOf('.')-1;
      if(decimalsToAddOnB > decimalsToAddOnA){
        for (let i = decimalsToAddOnB-decimalsToAddOnA; i > 0; i--) { numberB += '0'; }
      } else if(decimalsToAddOnA > decimalsToAddOnB){
        for (let i = decimalsToAddOnA-decimalsToAddOnB; i > 0; i--) { numberA += '0'; }
      }
    } else if(numberA.indexOf('.') !== -1) {
      let decimalsToAddOnB = numberA.length-numberA.indexOf('.')-1;
      numberB += '.';
      for (let i = decimalsToAddOnB; i > 0; i--) { numberB += '0'; }
    } else if(numberB.indexOf('.') !== -1) {
      let decimalsToAddOnA = numberB.length-numberB.indexOf('.')-1;
      numberA += '.';
      for (let i = decimalsToAddOnA; i > 0; i--) { numberA += '0'; }
    }
    if(numberA[0] === '-' && numberB[0] === '-'){
      if(numberA.length > numberB.length) { return 1; }
      if(numberB.length > numberA.length) { return -1; }
      if(numberA > numberB) { return 1; }
      if(numberB > numberA) { return -1; }
    } else if(numberA[0] === '-'){
      return 1;
    } else if(numberB[0] === '-'){
      return -1;
    } else {
      if(numberA.length > numberB.length) { return -1; }
      if(numberB.length > numberA.length) { return 1; }
      if(numberA > numberB) { return -1; }
      if(numberB > numberA) { return 1; }
    }
    return 0;
  }, fixValue = function(originalValue, min, max, maxlength, decimals){
    let value = originalValue.replace(decimals ? /[^\d\.\-]/g : /[^\d\-]/g,'');
    if(value !== ''){
      let dotPos = value.indexOf('.');
      if(dotPos !== -1){
        value = value.replace(/\./g,'');
        value = value.substr(0, dotPos)+'.'+value.substr(dotPos);
      }
      if(value.indexOf('-') !== -1){
        value = value.replace(/\-/g,'');
        value = '-'+value;
      }
      value = value.replace(/^-?0+/,'');
      if(decimals){
        if(value.indexOf('.') === 0) {
          value = '0' + value.substr(0, decimals+1);
        } else if(value.indexOf('.') !== -1) {
          value = value.substr(0, value.indexOf('.')+decimals+1);
        }
      } else if(value === '') { value = '0'; }
    }
    if(min && compareAsString(value, min) === 1) { value = min; }
    else if(max && compareAsString(value, max) === -1) { value = max; }
    if(maxlength && value.length > maxlength) { value = value.substr(0, maxlength); }
    return (value) === originalValue ? false : value;
  }, getFieldValue = function($inputElement){
    if($inputElement[0].type === 'number'){
      let clone = $inputElement.clone()[0];
      clone.type = 'text';
      return ''+clone.value.trim();
    }
    return $inputElement.val().trim();
  }, getInitialFieldValue = function($inputElement){
    return ''+($inputElement[0].value || $inputElement[0].defaultValue).trim();
  }, fixMaxlengthOnPaste = function($elem, maxlength){
    let value = getFieldValue($elem);
    if(value.length > maxlength) { $elem.val(value.substr(0, maxlength)); }
    if($elem[0].type === 'text') { $elem.attr('maxlength', maxlength); }
    $elem.data(dataKey).maxlength = maxlength;
  };
  $.fn.maskAsNumber = function(options){
    var options = options || {};
    this.each(function(idx, element){
      let data = {}, $elem = $(element), value = getInitialFieldValue($elem);
      data.maxlength = (options.maxlength || $elem.data(dataKey+'Maxlength')
        || $elem.attr('maxlength') || null);
      data.max = ''+(options.max || $elem.data(dataKey+'Max') || $elem.attr('max') || '');
      data.min = ''+(options.min || $elem.data(dataKey+'Min') || $elem.attr('min') || '');
      data.decimals = ''+(options.decimals || $elem.data(dataKey+'Decimals') || '');
      data.decimals = $.isNumeric(data.decimals) ? parseInt(data.decimals) : 0;
      if(element.type === 'number'){
        if(data.max !== '') { $elem.attr('max', data.max); }
        if(data.min !== '') { $elem.attr('min', data.min); }
        if($elem.attr('step') || false){
          if(data.decimals === 0){
            let step = $elem.attr('step'), dotPos = step.indexOf('.');
            if(dotPos !== -1){ data.decimals = step.length-dotPos-1; }
          }
        } else if(data.decimals){
          let step = '0.';
          for (let i = data.decimals; i > 1; i--) { step += '0'; }
          step += '1';
          $elem.attr('step', step);
        }
      }
      if (data.maxlength !== null){ data.maxlength = parseInt(data.maxlength); }
      if (data.max !== '' && data.maxlength === null && ((data.min !== '' && data.min[0] !== '-'))){
        data.maxlength = data.max.length;
        if(data.decimals) {
          if(data.max.indexOf('.') !== -1){ data.maxlength = data.max.indexOf('.'); }
          data.maxlength += data.decimals+1;
        }
      }
      if(data.maxlength !== null && element.type === 'text')
        $elem.attr('maxlength', data.maxlength);
      $elem.data(dataKey, data);
      if(value !== '-' && !(/\d/.test(value))){ $elem.val(''); return; }
      let fixedValue = fixValue(value, data.min, data.max, data.maxlength, data.decimals);
      if(fixedValue !== false) { $elem.val(fixedValue); }
    }).on('keypress.'+dataKey, function(event){
      if(event.ctrlKey || event.keyCode===13 || event.keyCode===9 || event.charCode===0) { return; }
      let char = event.char || String.fromCharCode(event.charCode), $this = $(this),
        data = $this.data(dataKey);
      if(data.receivedMinus && char === '-') {
        event.preventDefault();
        data.receivedMinus = false;
      } else { data.receivedMinus = char === '-'; }
      if(data.decimals){
        if(data.receivedDot && char === '.') {
          event.preventDefault();
          data.receivedDot = false;
        } else { data.receivedDot = char === '.'; }
      }
      if (data.min !== '' && data.min[0] !== '-' && data.receivedMinus){ event.preventDefault(); }
      else if (!data.receivedMinus && !data.receivedDot && /\D/.test(char))
        event.preventDefault();
    }).on('keyup.'+dataKey, function(event){
      let $this = $(this), data = $this.data(dataKey);
      if(data.receivedMinus || data.receivedDot){ return; }
      let value = getFieldValue($this);
      if(value === '' || value === '0') { return; }
      let fixedValue = fixValue(value, null, data.max, data.maxlength, data.decimals);
      if (fixedValue !== false) { $this.val(fixedValue); }
    }).on('focusout.'+dataKey, function(event){
      let $this = $(this), value = getFieldValue($this);
      if(value === '') { return; }
      let data = $this.data(dataKey);
      if(value === '-') { $this.val(''); }
      let fixedValue = fixValue(value, data.min, data.max, data.maxlength, data.decimals);
      if(fixedValue !== '0' && fixedValue !== false) { $this.val(fixedValue); }
    }).on('paste.'+dataKey, function(e){
      let pastedString;
      if(e.originalEvent.clipboardData){
        pastedString = (e.originalEvent || e).clipboardData.getData('text/plain');
      } else if(window.clipboardData){
        pastedString = window.clipboardData.getData('Text');
      } else { return; }
      pastedString = pastedString.trim();
      let minus = pastedString[0] === '-' ? '-' : '', $this = $(this), data = $this.data(dataKey),
        maxlength = data.maxlength;
      pastedString = minus+pastedString.replace(/\D/g,'');
      if(maxlength){
        data.maxlength = null;
        if((this.type === 'text')) { $this.removeAttr('maxlength'); }
        setTimeout(fixMaxlengthOnPaste, 100, $this, maxlength);
      }
    });
    return this;
  };
})(jQuery);
