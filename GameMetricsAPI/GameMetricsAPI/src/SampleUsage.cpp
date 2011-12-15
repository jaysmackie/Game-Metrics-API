#include <Windows.h>
#include <Winhttp.h>
#include <iostream>

#include "GameMetrics.h"

#pragma comment( lib,"Winhttp.lib")


int main(int argc,char** argv){ 

    /* Early in the program execution */
	GameMetrics *metricsSystem = GameMetrics::GetInstance();
	metricsSystem->Initialise(new string("localhost"), new string("/gameMetrics/testTuxRacer.php"));
}

/* Int to string */
string itos(int i)
{
    stringstream s;
    s << i;
    return s.str();
}

/* Double to string */
string dtos(double d)
{
    stringstream s;
    s << d;
    return s.str();
}
void duringRuntime()
{
    /* At any point you need to send metric then something like this*/
    /* get the GameMetrics Singleton*/
	GameMetrics *metricsSystem = GameMetrics::GetInstance();

    /* create a data string with values from the game */
    string dataToSend("?");
    dataToSend.append("x=").append(itos(x));
    dataToSend.append("&y=").append(itos(y));
    dataToSend.append("&speedx=").append(dtos(speed));

    /* send the message to the host and php path you initialised to earlier */
    metricsSystem->SendMessage(&dataToSend);
}