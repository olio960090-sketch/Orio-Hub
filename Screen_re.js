document.getElementById('saveBtn').onclick = function () {
  if (recordedBlob) {
    const a = document.createElement("a");
    a.href = URL.createObjectURL(recordedBlob);
    a.download = "screen_recording.webm";
    a.click();

    setStatus("Saved! You can restart.");

    recordedChunks = [];
    recordedBlob = null;

    // Show Restart button
    document.getElementById("restartBtn").style.display = "inline-block";

    // Hide Save / Stop
    document.getElementById("saveBtn").style.display = "none";
    document.getElementById("stopBtn").style.display = "none";

    // Keep Start hidden until restart is clicked
    document.getElementById("startBtn").style.display = "none";
  }
};
