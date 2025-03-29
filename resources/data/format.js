import fs from 'fs'

const movedShips =  JSON.parse(fs.readFileSync('./movements-types.json', 'utf8')).names
const countryEmoji =  JSON.parse(fs.readFileSync('./ships-types.json', 'utf8')).emoji
const shipData = JSON.parse(fs.readFileSync('./ships.json', 'utf8'))
const movementData = JSON.parse(fs.readFileSync('./movements.json', 'utf8'))

const formattedData = []

function convertMinutesToHumanReadable(minutes){
    const d = Math.floor(minutes / 1440)
    const h = Math.floor((minutes - (d * 1440)) / 60)
    const m = Math.round(minutes % 60)

    let output = ''

    if (m > 0) output = `${m} minute${m > 1 ? 's' : ''}`
    if (h > 0) output = `${h} hour${h > 1 ? 's': ''}, ${output}`
    if (d > 0) output = `${d} day${d > 1 ? 's': ''}, ${output}`
    return output
}

for (const ship of movedShips) {
    let data = {}
    shipData.find(s => {
        if (s.name === ship) {
            data = s
            data.nationality_emoji = s.nationality ? countryEmoji[s.nationality] : '🏴'
        }
    })

    data.berths = {
        CAM: 0,
        LS1: 0,
        LS2: 0,
        LS2: 0,
        LS3: 0,
        LS4: 0,
        LS5: 0,
        NORTH: 0,
    }

    let timeInPort = 0
    let visits = 0

    movementData.filter(m => {
        if (m.name === ship) {
            let berth = m.berth
            if (berth === 'LS2 W') berth = 'LS2'

            data.berths[berth]++
            timeInPort += m.time_in_port
            visits++
        }
    })

    data.timeInPort = timeInPort
    data.timeInPortHours = convertMinutesToHumanReadable(timeInPort)
    data.visits = visits

    data.berths.favourite = (Object.keys(data.berths)).reduce((max, berth) => {
        return data.berths[berth] > data.berths[max] ? berth : max
    })

    formattedData.push(data)
}

fs.writeFileSync('./formatted-data.json', JSON.stringify(formattedData, null, 2))
