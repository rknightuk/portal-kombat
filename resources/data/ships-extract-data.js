import fs from 'fs'

const ships = JSON.parse(fs.readFileSync('./ships.json'))
const data = {
    types: [],
    ports: [],
    countries: [],
    emoji: {
        'AMERICAN': '🇺🇸',
        'ANT&BARBUDA': '🇦🇬',
        'ANTIGUA': '🇦🇬',
        'ANTIGUA & BARBUDA': '🇦🇬',
        'ANTIGUA AND BARBUDA': '🇦🇬',
        'ANTIGUA AND BARMUDA': '🇦🇬',
        'ANTIGUA BARBUD': '🇦🇬',
        'ANTIGUA BARBUDA': '🇦🇬',
        'ANTIGUA& BARBUDA': '🇦🇬',
        'ANTIGUA&BARBUDA': '🇦🇬',
        'ANTIGUAN': '🇦🇬',
        'BAHAMANIAN': '🇧🇸',
        'BAHAMAS': '🇧🇸',
        'BAHAMNIAN': '🇧🇸',
        'BARBADOS': '🇧🇧',
        'BARDADOS': '🇧🇧',
        'BELGIUM': '🇧🇪',
        'BERDADOS': '🇧🇧',
        'BERMADU': '🇦🇬',
        'BERMUDA': '🇦🇬',
        'BRITISH': '🇬🇧',
        'CAYMAN FLAG': '🇰🇾',
        'CAYMAN IS': '🇰🇾',
        'CAYMAN ISLANDS': '🇰🇾',
        'CHINA': '🇨🇳',
        'COOK ISLANDS': '🇨🇰',
        'CYPRESS': '🇨🇾',
        'CYPRUS': '🇨🇾',
        'DANISH': '🇩🇰',
        'DENISH': '🇩🇰',
        'DENMARK': '🇩🇰',
        'DENMARK (DIS)': '🇩🇰',
        'DENMRK': '🇩🇰',
        'DUTCH': '🇳🇱',
        'EGYPT': '🇪🇬',
        'FAROE ISLANDS': '🇫🇴',
        'FINLAND': '🇫🇮',
        'FRANCE': '🇫🇷',
        'FRENCE': '🇫🇷',
        'FRENCH': '🇫🇷',
        'GERMAN': '🇩🇪',
        'GERMANY': '🇩🇪',
        'GIBRALTAR': '🇬🇮',
        'GREECE': '🇬🇷',
        'HONG KONG': '🇭🇰',
        'ISLE OF MAN': '🇮🇲',
        'ISLE OF MANN': '🇮🇲',
        'ITALIAN': '🇮🇹',
        'ITALY': '🇮🇹',
        'JERSEY': '🇯🇪',
        'LIBERIA': '🇱🇷',
        'LIBERIAN': '🇱🇷',
        'LIBIAN': '🇱🇾',
        'LUXEMBORG': '🇱🇺',
        'LUXEMBOURG': '🇱🇺',
        'MADEIRA': '🏴󠁰󠁴󠀳󠀰󠁿',
        'MALTA': '🇲🇹',
        'MALTESE': '🇲🇹',
        'MARSHAL ISLAN': '🇲🇭',
        'MARSHALL ISL': '🇲🇭',
        'MARSHALL ISLAND': '🇲🇭',
        'MARSHALL ISLANDS': '🇲🇭',
        'MATLA': '🇲🇹',
        'MONROVIA': '🇱🇷',
        'NETHERLAND': '🇳🇱',
        'NETHERLANDS': '🇳🇱',
        'NORWAY': '🇳🇴',
        'NORWAY (NIS)': '🇳🇴',
        'NORWEGIAN': '🇳🇴',
        'PANAMA': '🇵🇦',
        'PANAMANIAN': '🇵🇦',
        'PORTUGAL': '🇵🇹',
        'PORTUGAL (MAR)': '🇵🇹',
        'PORTUGUESE': '🇵🇹',
        'RUSSIA': '🇷🇺',
        'RUSSIAN': '🇷🇺',
        'SINGAPORE': '🇸🇬',
        'SRI LAKA': '🇱🇰',
        'ST VINCENT': '🇻🇨',
        'ST VINCENT & THE GRE': '🇻🇨',
        'SWEDEN': '🇸🇪',
        'SWEDISH': '🇸🇪',
        'SWITZERLAND': '🇨🇭',
        'U.S.A': '🇺🇸',
        'UK': '🇬🇧',
        'UNITED KINGDOM': '🇬🇧',
        'UNITED KINGODM': '🇬🇧',
        'UNITED STATES': '🇺🇸',
        'UNITEDKINGDOM': '🇬🇧',
        'UNTIED KINGDOM': '🇬🇧',
        'USE': '🇺🇸',
        'VANUATA': '🇻🇺',
        '`PORTUGESE': '🇵🇹',
    }
}

const shipCount = {
    "CRUISE": 0,
    "DREDGER": 0,
    "FERRY": 0,
    "FREIGHTER": 0,
    "FUEL BARGE": 0,
    "MISC BARGE": 0,
    "MISCELLANEOUS": 0,
    "STEAMBOAT": 0,
    "TUG": 0,
    "WAVE PIERCING CRAFT": 0,
}

const yachts = []

ships.forEach(ship => {
    shipCount[ship.type]++
    if (['WAVE PIERCING CRAFT'].includes(ship.type)) {
        yachts.push(ship.name)
    } else if (ship.grt < 75 && !ship.name.includes('DUMMY') && !ship.name.includes('TEST') && ship.name) {
        yachts.push(ship.name)
    }
    data.types.push(ship.type)
    data.ports.push(ship.port)
    data.countries.push(ship.nationality)
});

const dedupedData = {
    types: [...new Set(data.types)].filter(t => t).sort(),
    ports: [...new Set(data.ports)].filter(p => p).sort(),
    countries: [...new Set(data.countries)].filter(c => c).sort(),
    emoji: data.emoji,
}

console.log(shipCount)
console.log(yachts)
console.log(yachts.length)

fs.writeFileSync('./ships-types.json', JSON.stringify(dedupedData, null, 2))
