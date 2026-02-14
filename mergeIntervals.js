'use strict';

process.stdin.resume();
process.stdin.setEncoding('utf-8');

let inputString = '';
let currentLine = 0;

process.stdin.on('data', function(inputStdin) {
    inputString += inputStdin;
});

process.stdin.on('end', function() {
    inputString = inputString.split('\n');

    main();
});

function readLine() {
    return inputString[currentLine++];
}



/*
 * Complete the 'mergeHighDefinitionIntervals' function below.
 *
 * The function is expected to return a 2D_INTEGER_ARRAY.
 * The function accepts 2D_INTEGER_ARRAY intervals as parameter.
 */

function mergeHighDefinitionIntervals(intervals) {
    let cleanArray = [];


    intervals.sort((a,b) => a[0] - b[0]);

    for (let i = 0; i < intervals.length; i++) {
        let newInterval = intervals[i];

        if (i == 0) {
            cleanArray.push(newInterval);
            continue;
        }
        else if (intervals[i][0] <= cleanArray[cleanArray.length-1][1]) {
            newInterval = [];
            newInterval.push(cleanArray[cleanArray.length-1][0]);
            newInterval.push(Math.max(cleanArray[cleanArray.length-1][1], intervals[i][1]));

            // overwrite the old value to merge
            cleanArray[cleanArray.length-1] = newInterval;
        } else {
            cleanArray.push(newInterval);
        }

    }

    return cleanArray;
}

function main() {
    const intervalsRows = parseInt(readLine().trim(), 10);

    const intervalsColumns = parseInt(readLine().trim(), 10);

    let intervals = Array(intervalsRows);

    for (let i = 0; i < intervalsRows; i++) {
        intervals[i] = readLine().replace(/\s+$/g, '').split(' ').map(intervalsTemp => parseInt(intervalsTemp, 10));
    }

    const result = mergeHighDefinitionIntervals(intervals);

    process.stdout.write(result.map(x => x.join(' ')).join('\n') + '\n');
}
