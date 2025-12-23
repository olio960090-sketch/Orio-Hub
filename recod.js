document.getElementById('restartBtn').onclick = function () {

  // Reset variables
  recordedChunks = [];
  recordedBlob = null;
  mediaRecorder = null;
  streamRef = null;

  setStatus("Ready to record again.");

  // Reset UI
  document.getElementById("restartBtn").style.display = "none";
  document.getElementById("saveBtn").style.display = "none";
  document.getElementById("stopBtn").style.display = "none";
  document.getElementById("startBtn").style.display = "inline-block";
};
