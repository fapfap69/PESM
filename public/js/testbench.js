// PESM Test Bench JavaScript

const examples = {
    hello: {
        script: 'name = "World"\nMESSAGE "Hello " + name',
        variables: {}
    },
    if: {
        script: 'age = 25\n\nIF age >= 18\n  MESSAGE "Adult"\nELSE\n  MESSAGE "Minor"\nEND',
        variables: {}
    },
    foreach: {
        script: 'items = [1, 2, 3, 4, 5]\ntotal = 0\n\nFOREACH item IN items\n  total = total + item\nEND\n\nMESSAGE "Total: " + total',
        variables: {}
    },
    array: {
        script: 'matrix = [[1, 2], [3, 4]]\nvalue = matrix[0][1]\nMESSAGE "Value at [0][1]: " + value',
        variables: {}
    }
};

function loadExample(name) {
    const example = examples[name];
    if (example) {
        document.getElementById('script').value = example.script;
        document.getElementById('variables').value = JSON.stringify(example.variables, null, 2);
    }
}

document.getElementById('scriptForm').addEventListener('submit', async (e) => {
    e.preventDefault();
    
    const script = document.getElementById('script').value;
    const variablesText = document.getElementById('variables').value;
    
    let variables = {};
    try {
        variables = JSON.parse(variablesText);
    } catch (e) {
        showError('Invalid JSON in variables: ' + e.message);
        return;
    }
    
    // Show loading
    document.getElementById('results').innerHTML = '<div class="alert alert-info">⏳ Executing...</div>';
    
    try {
        const response = await fetch('testbench.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ script, variables })
        });
        
        const result = await response.json();
        displayResults(result);
    } catch (error) {
        showError('Execution error: ' + error.message);
    }
});

function displayResults(result) {
    const resultsDiv = document.getElementById('results');
    const variablesOutput = document.getElementById('variablesOutput');
    const executionLog = document.getElementById('executionLog');
    
    if (result.status === 'success') {
        resultsDiv.innerHTML = `
            <div class="alert alert-success">
                <strong>✅ Success!</strong>
                ${result.message ? '<br>Message: ' + escapeHtml(result.message) : ''}
            </div>
        `;
    } else {
        resultsDiv.innerHTML = `
            <div class="alert alert-danger">
                <strong>❌ Error!</strong><br>
                ${escapeHtml(result.error || 'Unknown error')}
            </div>
        `;
    }
    
    variablesOutput.innerHTML = '<code>' + JSON.stringify(result.variables || {}, null, 2) + '</code>';
    executionLog.innerHTML = '<code>' + (result.log || 'No log available') + '</code>';
}

function showError(message) {
    document.getElementById('results').innerHTML = `
        <div class="alert alert-danger">
            <strong>❌ Error!</strong><br>
            ${escapeHtml(message)}
        </div>
    `;
}

function escapeHtml(text) {
    const div = document.createElement('div');
    div.textContent = text;
    return div.innerHTML;
}
