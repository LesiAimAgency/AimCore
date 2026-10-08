const fs = require('fs');

const files = [
  'public/themes/inbetween_v2/js/inbetween.js',
  'public/themes/inbetween_v2/assets/js/inbetween.js',
  'inbetween_v2/assets/js/inbetween.js'
];

for (const file of files) {
  if (!fs.existsSync(file)) {
    console.log('Skipping missing file:', file);
    continue;
  }
  let js = fs.readFileSync(file, 'utf8');

  // 1. Remove window.innerWidth < 1024 from wheel handler C
  const oldWheel = 'const C=w=>{if(window.innerWidth<1024||Math.abs(w.deltaY)<18||document.body.classList.contains("modal-open")||';
  const newWheel = 'const C=w=>{if(Math.abs(w.deltaY)<18||document.body.classList.contains("modal-open")||';
  if (js.includes(oldWheel)) {
    js = js.replace(oldWheel, newWheel);
    console.log('Updated wheel in', file);
  } else {
    console.log('Wheel target not found in', file);
  }

  // 2. Prevent pointerType === 'touch' in pointerdown in hero
  const oldPointer = 'o.addEventListener("pointerdown",k=>{k.button===0&&';
  const newPointer = 'o.addEventListener("pointerdown",k=>{if(k.pointerType==="touch")return;k.button===0&&';
  if (js.includes(oldPointer)) {
    js = js.replace(oldPointer, newPointer);
    console.log('Updated pointerdown in', file);
  } else {
    console.log('Pointer target not found in', file);
  }

  // 3. Update touchend logic for l === 0
  const oldTouchHero = 'if(l===0){const y=A-w.changedTouches[0].clientY,p=L-w.changedTouches[0].clientX;Math.abs(y)>30&&Math.abs(y)>Math.abs(p)&&(window._heroIntroComplete&&!window._heroIntroComplete()?null:y>0?window._heroGetCurrentFrame&&window._heroGetCurrentFrame()<window._heroGetTotalFrames()?window._heroNextFrame&&window._heroNextFrame():window._heroCanLeaveToNext&&window._heroCanLeaveToNext(y)&&m(1):window._heroGetCurrentFrame&&window._heroGetCurrentFrame()>0&&window._heroPrevFrame&&window._heroPrevFrame());return}';
  const newTouchHero = 'if(l===0){const y=A-w.changedTouches[0].clientY,p=L-w.changedTouches[0].clientX;if(Math.abs(y)>30&&Math.abs(y)>Math.abs(p)){if(window._heroIntroComplete&&!window._heroIntroComplete())return;const isMob=window.innerWidth<1024,curF=window._heroGetCurrentFrame?window._heroGetCurrentFrame():0,totF=window._heroGetTotalFrames?window._heroGetTotalFrames():23;if(y>0){if(isMob){if(curF<totF){window._heroGoToFrame&&window._heroGoToFrame(totF);window._heroNotifyLanded&&window._heroNotifyLanded()}else{m(1)}}else{curF<totF?window._heroNextFrame&&window._heroNextFrame():window._heroCanLeaveToNext&&window._heroCanLeaveToNext(y)&&m(1)}}else{if(isMob){if(curF>0){window._heroGoToFrame&&window._heroGoToFrame(0)}}else{curF>0&&window._heroPrevFrame&&window._heroPrevFrame()}}}return}';
  if (js.includes(oldTouchHero)) {
    js = js.replace(oldTouchHero, newTouchHero);
    console.log('Updated touch hero in', file);
  } else {
    console.log('Touch hero target not found in', file);
  }

  // 4. Update block start in m(w)
  const oldM = 'e[w].scrollIntoView({behavior:"smooth"})';
  const newM = 'e[w].scrollIntoView({behavior:"smooth",block:"start"})';
  if (js.includes(oldM)) {
    js = js.replace(oldM, newM);
    console.log('Updated scrollIntoView in', file);
  }

  fs.writeFileSync(file, js, 'utf8');
}
console.log('All JS files updated successfully!');
