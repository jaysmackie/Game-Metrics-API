
#ifndef _GAME_METRICS_EVENTS_
#define _GAME_METRICS_EVENTS_

#include <vector>
#include <string>

using namespace std;

namespace GameMetricDefines
{
    static const char*  versionLabel = "1.0";
    static const int    defaultI = -999999;
    static const double defaultD = -999999.f;

    enum eventTypes
    {
        PLAYER_DEATH = 0,
        PLAYER_RESPAWN,
        PLAYER_JUMP,
        MAX_EVENT_TYPES
    };
    
    static const char* const eventTypeNames[MAX_EVENT_TYPES] = {
        "Player died",
        "Player respawed",
        "Player jumped"
    };

    enum eventSubtypes
    {
        GRENADE = 0,
        FALL,
        POISON,
        MAX_EVENT_SUBTYPES
    };

    static const char* const eventSubtypeNames[MAX_EVENT_SUBTYPES] = {
        "Grenade",
        "Fall",
        "Poison"
    };
};

#endif