document.getElementById('saveBtn').onclick = function () {
  if (recordedBlob) {
    const a = document.createElement("a");
    a.href = URL.createObjectURL(recordedBlob);
    a.download = "screen_recording.webm";
    a.click();

    setStatus("Saved to computer. Ready for new recording.");

    recordedChunks = [];
    recordedBlob = null;

    document.getElementById("saveBtn").style.display = "none";
    document.getElementById("stopBtn").style.display = "none";
    document.getElementById("startBtn").style.display = "inline-block";
  }
};
