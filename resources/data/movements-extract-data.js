import fs from 'fs'
import { DateTime } from 'luxon'

let arrival = '1/1/23 11:13'
let depature = '1/2/23 6:30'

const start = DateTime.fromFormat(arrival, 'M/d/yy H:m')
const end = DateTime.fromFormat(depature, 'M/d/yy H:m')

const diff = end.diff(start, 'hours').toObject().hours



const ships = JSON.parse(fs.readFileSync('./movements.json'))
const data = {
    names: [],
    from: [],
    to: [],
    berths: [],
}


const formattedShips = ships.map(ship => {
    data.names.push(ship.name)
    data.from.push(ship.from)
    data.to.push(ship.location_to)
    data.berths.push(ship.berth)

    const start = DateTime.fromFormat(ship.arrival_datetime2 ? ship.arrival_datetime2 : ship.arrival_datetime, 'M/d/yy H:m')
    const end = DateTime.fromFormat(ship.departure_datetime2 ? ship.departure_datetime2 : ship.departure_datetime, 'M/d/yy H:m')

    const diff = end.diff(start, 'minutes').toObject().minutes

    return {
        ...ship,
        time_in_port: diff,
    }
})

fs.writeFileSync('./movements.json', JSON.stringify(formattedShips, null, 2))

const dedupedData = {
    names: [...new Set(data.names)].filter(n => n).sort(),
    from: [...new Set(data.from)].filter(f => f).sort(),
    to: [...new Set(data.to)].filter(t => t).sort(),
    berths: [...new Set(data.berths)].filter(b => b).sort(),
}

fs.writeFileSync('./movements-types.json', JSON.stringify(dedupedData, null, 2))
