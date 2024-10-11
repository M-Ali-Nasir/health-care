document.addEventListener('DOMContentLoaded', function() {
    const canvas = document.getElementById('paint-canvas');
    const ctx = canvas.getContext('2d');
    const colorPicker = document.getElementById('color-picker');
    const brushSizeInput = document.getElementById('brush-size');
    const clearCanvasButton = document.getElementById('clear-canvas');
    const savePaintingButton = document.getElementById('save-painting');

    let isPainting = false;
    let brushColor = colorPicker.value;
    let brushSize = brushSizeInput.value;

    canvas.width = 800; // Set canvas width
    canvas.height = 600; // Set canvas height

    function startPainting(event) {
        isPainting = true;
        draw(event);
    }

    function stopPainting() {
        isPainting = false;
        ctx.beginPath(); // Start a new path to avoid connecting lines
    }

    function draw(event) {
        if (!isPainting) return;

        ctx.lineWidth = brushSize;
        ctx.lineCap = 'round';
        ctx.strokeStyle = brushColor;

        ctx.lineTo(event.clientX - canvas.offsetLeft, event.clientY - canvas.offsetTop);
        ctx.stroke();
        ctx.beginPath();
        ctx.moveTo(event.clientX - canvas.offsetLeft, event.clientY - canvas.offsetTop);
    }

    canvas.addEventListener('mousedown', startPainting);
    canvas.addEventListener('mouseup', stopPainting);
    canvas.addEventListener('mousemove', draw);
    canvas.addEventListener('mouseleave', stopPainting);

    colorPicker.addEventListener('input', function() {
        brushColor = colorPicker.value;
    });

    brushSizeInput.addEventListener('input', function() {
        brushSize = brushSizeInput.value;
    });

    clearCanvasButton.addEventListener('click', function() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
    });

    savePaintingButton.addEventListener('click', function() {
        const dataURL = canvas.toDataURL('image/png');
        const link = document.createElement('a');
        link.href = dataURL;
        link.download = 'painting.png';
        link.click();
    });
});
