// Monaco is already loaded, create editor directly
const defaultCode = `// PESM Script Example
name = "World"
age = 25

IF age >= 18
    status = "Adult"
ELSE
    status = "Minor"
END

MESSAGE "Hello " + name + "! Status: " + status
`;

const model = monaco.editor.createModel(defaultCode, 'pesm');
const editor = monaco.editor.create(document.getElementById('container'), {
  model: model,
  automaticLayout: true,
  minimap: { enabled: false },
  theme: 'vs-dark'
});

const statusEl = document.getElementById('status');

const validate = () => {
  statusEl.textContent = 'Validating...';
  statusEl.style.color = '#666';

  const code = model.getValue();

  fetch('validate.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
    body: 'code=' + encodeURIComponent(code)
  }).then(r => r.json()).then(data => {
    const markers = (data.markers || []).map(m => ({
      startLineNumber: m.startLineNumber || 1,
      startColumn: m.startColumn || 1,
      endLineNumber: m.endLineNumber || 1,
      endColumn: m.endColumn || 100,
      message: m.message || 'error',
      severity: (m.severity === 'warning') ? monaco.MarkerSeverity.Warning : monaco.MarkerSeverity.Error
    }));
    monaco.editor.setModelMarkers(model, 'pesm', markers);
    
    if (markers.length === 0) {
      statusEl.textContent = '✓ No errors';
      statusEl.style.color = 'green';
    } else {
      statusEl.textContent = `✗ ${markers.length} error(s)`;
      statusEl.style.color = 'red';
    }
  }).catch(err => {
    monaco.editor.setModelMarkers(model, 'pesm', [{
      startLineNumber: 1, startColumn: 1, endLineNumber: 1, endColumn: 100,
      message: err.message, severity: monaco.MarkerSeverity.Error
    }]);
    statusEl.textContent = '✗ Validation failed';
    statusEl.style.color = 'red';
  });
};

document.getElementById('validate').addEventListener('click', validate);

// Auto-validate on load
setTimeout(validate, 500);