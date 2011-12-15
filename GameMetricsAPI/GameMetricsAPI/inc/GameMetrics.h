
#ifndef _GAME_METRICS_
#define _GAME_METRICS_

#include <Windows.h>
#include <Winhttp.h>
#include <time.h>
#include <string>
#include <iostream>
#include <sstream>

#include "GameMetricsDefines.h"

using namespace std;

class GameMetrics
{
private:
	static GameMetrics* _instance;

    static const string* defaultServer;
    static const string* defaultPath;

    static const int MetricResultSize = 2048;

    static string* openMetricSessionPHP;
    static string* closeMetricSessionPHP;
    static string* registerEventsPHP;
    static string* startPlaySessionPHP;
    static string* stopPlaySessionPHP;
    static string* requestParametersPHP;
    static string* logEventPHP;
    static string* isAuthorisedPHP;
    static string* setAuthorisedPHP;

	bool initialised;
    bool metricSessionOpen;
    long startTime;
	wstring *server;
	wstring *basepath;
	void setResultString(string* result, const char* part1, bool useError, const char* part2);

    string metricSessionMD5;
    string playSessionMD5;
    

    string itos(int i)
    {
        stringstream s;
        s << i;
        return s.str();
    }
    string dtos(double d)
    {
        stringstream s;
        s << d;
        return s.str();
    }

    static bool debugMode;

protected:
	GameMetrics(bool autoInitialise);

public:  
	virtual ~GameMetrics();

    enum PHPPathType {
        OPEN_METRIC_SESSION = 0,
        CLOSE_METRIC_SESSION,
        REGISTER_EVENTS,
        START_PLAY_SESSION,
        STOP_PLAY_SESSION,
        REQUEST_PARAMETERS,
        LOG_EVENT,
        IS_AUTHORISED,
        SET_AUTHORISED
    };

    void SetPHPPath(PHPPathType pathID, const string* newPath);

	static GameMetrics* GetInstance(bool autoInitialise = true);
    
	void Initialise(const string* host, const string* path = NULL);
	void SetServer(const string* server);
	void SetPath(const string* path);

	bool SendMessage(string* urlData, string *result = NULL, string* urlPath = NULL);

    void OpenMetricSession(const string uniqueID);
    void CloseMetricSession();
    
    void RegisterEvents();

    bool IsAuthorised(const string uniqueID);
    void SetAuthorised(const string uniqueID, bool auth = true);    

    void StartPlaySession();
    void StopPlaySession();

    void SetDebugMode(bool mode);

    string* RequestParameters(string* data);

    void LogEvent(int type, int subtype, int x, int y, int z, double magnitude, string* data);
    void LogEvent(int type, int subtype, int x, int y, int z, double magnitude);
    void LogEvent(int type, int subtype, int x, int y, int z);
    void LogEvent(int type, int subtype, double magnitude);
    void LogEvent(int type, int x, int y, int z);
    void LogEvent(int type, double magnitude);
    void LogEvent(int type, string* data);

    void LogEventDebug(int type, int subtype, int x, int y, int z, double magnitude, string* data);
    void LogEventDebug(int type, int subtype, int x, int y, int z, double magnitude);
    void LogEventDebug(int type, int subtype, int x, int y, int z);
    void LogEventDebug(int type, int subtype, double magnitude);
    void LogEventDebug(int type, int x, int y, int z);
    void LogEventDebug(int type, double magnitude);
    void LogEventDebug(int type, string* data);
};

#endif