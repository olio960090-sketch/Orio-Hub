saveBtn.addEventListener('click',()=>{
  if(recordedBlob){
    const filename='screen_'+Date.now()+'.webm';
    const url=URL.createObjectURL(recordedBlob);
    const a=document.createElement('a');
    a.href=url;
    a.download=filename;
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
    URL.revokeObjectURL(url);
    saveBtn.style.display='none';
    setStatus('Saved to computer.');
  }
});
